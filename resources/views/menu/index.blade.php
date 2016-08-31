@extends('layouts.main')
@section('title', 'Menu')

@section('content')

@if($message != '')
<div class="w3-panel w3-red">
<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
	<h3><p>{{$message}}</p></h3>
</div>
@endif

<a href="{{ url('/addMenu/' . $store->id) }}" style="text-decoration:none; position: fixed; top: 52px; right: 50px;" class="w3-btn-floating w3-teal w3-right ">+</a>
<h1>{{$store->name}}</h1>

<ul class="w3-ul w3-border">
@foreach($store->menus as $menu)
      <li>{{ $menu->name }}:{{ $menu->price }}</li>
@endforeach
</ul>
<p><a href="{{ url('/editMenu/' . $store->id) }}" class="w3-btn w3-theme">編輯菜單</a></p>
@endsection