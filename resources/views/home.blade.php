@extends('layouts.app')

@section('content')
<div class="container">
   
   <div class="col-md-12">
   <resto-group :restos="{{json_encode($restos)}}"></resto-group>
   </div>
  
   <div class="col-md-12">
   <menu-container :items="{{json_encode($menus)}}" :resto-id="{{$restoId}}"></menu-container>
   </div>
</div>
@endsection
