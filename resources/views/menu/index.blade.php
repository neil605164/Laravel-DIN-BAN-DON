@extends('layouts.main')
@section('title', 'Menu')

@section('content')

<a href="{{ url('/addMenu/' . $store->id) }}" style="text-decoration:none; position: fixed; top: 52px; right: 50px;" class="w3-btn-floating w3-teal w3-right ">+</a>
<h1>{{$store->name}}</h1>

<ul class="w3-ul w3-border">
@foreach($store->menus as $menu)
      <li>{{ $menu->name }}:{{ $menu->price }}</li>
@endforeach
</ul>
<a href="{{ url('/editMenu/' . $store->id) }}" class="w3-btn w3-theme">Edit Menu</a>
@endsection