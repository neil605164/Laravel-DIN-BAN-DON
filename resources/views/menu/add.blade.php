@extends('layouts.main')
@section('title', 'Menu Information')

@section('content')
<form class="w3-container" method="POST" action="{{ url('/addMenu') }}">
	{{ csrf_field() }}
    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Menu Name</label>
        <input type="text" class="w3-input w3-border" name="name" autofocus>  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Menu Price</label>
        <input type="text" class="w3-input w3-border" name="price" >
    </div>
    
    <input type="hidden" name="id" value="{{$store_id}}">    

    <div class="w3-input-group">                      
    <button class="w3-btn w3-blue">add Menu</button>
    </div>
</form>
@endsection
