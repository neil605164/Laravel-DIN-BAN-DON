@extends('layouts.main')
@section('title', 'Store Information')

@section('content')
<form class="w3-container" method="POST" action="{{ url('/add') }}">
	{{ csrf_field() }}
    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Store Name</label>
        <input type="text" class="w3-input w3-border" name="name" autofocus>  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Store Tel</label>
        <input type="text" class="w3-input w3-border" name="tel" >
    </div>
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Store Address</label>
        <input type="text" class="w3-input w3-border" name="addr">
    </div class="w3-input-group">

    <div>
    	<?php $types=['早餐','午餐','晚餐','下午茶']; ?>
    	@foreach($types as $type)
    	<input class="w3-radio" type="radio" name="type" value="{{$type}}">
		<label class="w3-validate">{{$type}}</label>
		@endforeach
    </div>
        

    <div class="w3-input-group">                      
    <button class="w3-btn w3-blue">增加店家</button>
    </div>
</form>
@endsection
