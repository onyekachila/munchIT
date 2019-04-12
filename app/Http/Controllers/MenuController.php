<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidation;
use App\Models\Category;
use App\Models\Menu;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function index($id)
    {
        $restoId = $id;
        $service = new MenuService;
        $menus = $service->getMenuWithCategories($restoId);

        if (!$menus) {
            abort(400, 'Wrong Restaurant');
        }

        return view('menus.menu-index', compact('menus', 'restoId'));
    }
    
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidation(request('restoId'))],
        ]);

        $category = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['restoId'],
            'category_id' => $category->id,
        ]);

        return response()->json($menu, 201);
    }

    public function getRestoMenu(Request $request)
    {
        $this->validate($request, [
            'restoId' => 'required|exists:restaurants,id',
        ]);

        $menuItems = Menu::where('resto_id', $request->input('restoId'))->get();
        return response()->json($menuItems, 200);
    }
}
