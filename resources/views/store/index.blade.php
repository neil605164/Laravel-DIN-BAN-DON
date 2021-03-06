@extends('layouts.main')
@section('title', 'Store')

@section('content')
@if($message != '')
<div class="w3-panel w3-red">
<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
	<h3><p>{{$message}}</p></h3>
</div>
@endif

<a href="{{ url('/add') }}" style="text-decoration:none; position: fixed; top: 52px; right: 50px;" class="w3-btn-floating w3-teal w3-right ">+</a>
@foreach($stores as $index => $store)
<div class="w3-panel w3-leftbar {{ $class[ $index%4 ] }}">

    <ul class="w3-ul w3-border">
      <li><a href="/edit/{{ $store->id }}" style="text-decoration:none;" ><h2 class='w3-text-theme w3-hover-text-amber  '>{{ $store->name }}</h2></a></li>
      <li>Tel:{{ $store->tel }}</li>
      <li>addr:{{ $store->addr }}</li>
      <li>type:{{ $store->type }}</li>
    </ul>

<p><a href="{{ url('/menu/' . $store->id) }}" class="w3-btn w3-theme">顯示菜單</a></p>
</div>
@endforeach
@endsection