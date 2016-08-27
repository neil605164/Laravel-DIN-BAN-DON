@extends('layouts.main')
@section('title', 'Store')

@section('content')

<p>{{$message}}</p>
<a href="{{ url('/add') }}" style="text-decoration:none; position: fixed; top: 52px; right: 50px;" class="w3-btn-floating w3-teal w3-right ">+</a>
@foreach($stores as $index => $store)
<div class="w3-panel w3-leftbar {{ $class[ $index%4 ] }}">

    <ul class="w3-ul w3-border">
      <li><a href="/edit/{{ $store->id }}" style="text-decoration:none;" ><h2 class='w3-text-theme w3-hover-text-amber  '>{{ $store->name }}</h2></a></li>
      <li>Tel:{{ $store->tel }}</li>
      <li>addr:{{ $store->addr }}</li>
      <li>type:{{ $store->type }}</li>
    </ul>

    <ul class="w3-ul w3-border">
      <li><a href="/addMenu/{{ $store->id }}" style="text-decoration:none;" ><h3 class='w3-text-theme w3-hover-text-amber'>Menu</h3></a></li>
      @foreach($store->menus as $menu)
      <li>{{ $menu->name }}</li>
      @endforeach
    </ul>

</div>
@endforeach
@endsection