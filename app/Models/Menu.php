<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $with = ['category'];  // whenever $this model is being called make sure it comes with the relationship. i.e. ralated date
    
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
