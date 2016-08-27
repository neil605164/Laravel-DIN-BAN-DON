@extends('layouts.main')
@section('title', 'Edit Store')

@section('content')
<form class="w3-container" method="POST" action="{{ url('/edit') }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Store Name</label>
        <input type="text" class="w3-input w3-border" name="name" value="{{$store->name}}"autofocus >  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Store Tel</label>
        <input type="text" class="w3-input w3-border" name="tel" value="{{$store->tel}}" >
    </div>
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Store Address</label>
        <input type="text" class="w3-input w3-border" name="addr" value="{{$store->addr}}" >
    </div class="w3-input-group">

    <div>
        <?php $types=['aa','bb','cc','dd']; ?>
        @foreach($types as $type)
            @if($type == $store->type)
                <input class="w3-radio" type="radio" name="type" value="{{$type}}" checked/>
            @else 
                <input class="w3-radio" type="radio" name="type" value="{{$type}}" >
            @endif
            <label class="w3-validate">{{$type}}</label>
        @endforeach
    </div>
    
    <input type="hidden" name="id" value="{{$store->id}}">   

    <div class="w3-input-group">                      
	    <button class="w3-btn w3-blue">Edit</button>
	    <button class="w3-btn w3-red" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</button>
    </div>
</form>

<form id="delete-form" action="{{ url('/store') }}" method="POST" style="display: none;">{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="id" value="{{$store->id}}">

</form>
@endsection