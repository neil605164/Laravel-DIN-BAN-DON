@extends('layouts.main')
@section('title', 'Store')

@section('content')

<div class="w3-card-4">
	<form action="{{ url('/deleteOrder') }}" method="post" class="w3-container">
	{{ csrf_field() }}

		<p>
		@foreach($members as $member)
			<input type="checkbox" value="{{ $member->id }}" name="members[]" >
			<label class="checkbox-inline">{{ $member->menu->name }}</label>||
			<label class="checkbox-inline">{{ $member->menu->price }}</label>元
			<br>
		@endforeach
		</p>
		<input type="text" name="username" value="{{Auth::user()->name}}" readonly=""><br>
		<button class="w3-btn w3-teal  w3-margin" >delete</button>
	</form>
</div>

@endsection