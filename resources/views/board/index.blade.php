@extends('layouts.main')
@section('title', 'Store')

@section('content')

<p>{{$message}}</p>


<div class="w3-card-4">
	<form class="w3-container" method="post" name="myform">
	{{ csrf_field() }}
		@foreach ($boards as $board)
			<div class="w3-card-4 w3-padding">

				<header class="w3-container w3-light-grey">
					<h3><?= $board->name ?></h3>
				</header>

				<div class="w3-container">
					<p>截止時間:{{ $board->endtime }}</p>
					<br>
				</div>

				<div class="w3-container">
					<p>店家名稱:{{ $board->store->name }}</p>
					<br>
				</div>

				<p><a href="{{ url('/addOrder/' . $board->id ) }}" class="w3-btn-block w3-theme-l4">我也要訂</a></p>
				<p><a href="{{ url('/deleteOrder/' . $board->id ) }}" class="w3-btn-block w3-dark-grey">查詢訂購結果</a></p>
				<p><a href="{{ url('/delete/' . $board->id ) }}" class="w3-btn-block w3-grey">訂餐截止</a></p>

			</div>
		@endforeach	
	</form>
</div>

@endsection