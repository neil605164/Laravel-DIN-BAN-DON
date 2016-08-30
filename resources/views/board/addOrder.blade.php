@extends('layouts.main')
@section('title', 'Store')

@section('content')

<div class="w3-card-4">
	<form action="{{ url('/addOrder') }}" method="post" class="w3-container">
	{{ csrf_field() }}
		<p>
			<div class="w3-container w3-green">
				<h2>{{ $board->store->name }}</h2>
			</div>
		
		</p>

		<p>
		@foreach($board->store->menus as $menu)
			<input type="checkbox" value="{{ $menu->id }}" name="menus[]" >
			<label class="checkbox-inline">{{ $menu->name }}</label>||
			<label class="checkbox-inline">{{ $menu->price }}</label>元
			<br>
		@endforeach
		</p>
		
		<input type="text" name="username" value="{{Auth::user()->name}}" readonly=""><br>
		<input type="hidden" value="{{ $board->id }}" name="board_id" >
		<input type="hidden" value="{{ $board->store->id }}" name="store_id" >
		<button class="w3-btn w3-teal  w3-margin" >儲存資料</button>
	</form>
</div>

@endsection