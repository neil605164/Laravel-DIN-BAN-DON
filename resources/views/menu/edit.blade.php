@extends('layouts.main')
@section('title', 'Edit Store')

@section('content')
<form class="w3-container" method="POST" action="{{ url('/editMenu') }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">

    @foreach($store->menus as $menu)
        <div class="w3-input-group">
            <label for="name" class="w3-label w3-text-blue">Menu Name</label>
            <input type="text" class="w3-input w3-border" name="name[]" value="{{$menu->name}}"autofocus >  
        </div>
                              
        <div class="w3-input-group">                        
            <label for="email" class="w3-label w3-text-blue">Menu Price</label>
            <input type="text" class="w3-input w3-border" name="price[]" value="{{$menu->price}}" >
        </div>
        <input type="hidden" name="id[]" value="{{$menu->id}}">   
    @endforeach
    <input type="hidden" name="store_id" value="{{$store->id}}">

    <div class="w3-input-group">                      
	    <button class="w3-btn w3-blue">Edit</button>
	    <button class="w3-btn w3-red" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</button>
    </div>
    
</form>

<form id="delete-form" action="{{ url('/aa')}}" method="POST" style="display: none;">{{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="id" value="{{$store->id}}">
</form>
@endsection