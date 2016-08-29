@extends('layouts.main')
@section('title', 'Store')

@section('content')

<form action="{{ url('/create') }}" method="POST">
    {{ csrf_field() }}
    
    <div class="w3-container  w3-light-blue ">
        <h2>假奔啦</h2>
    </div>

    <p>
    <label class="w3-label">標題(單位名稱)RD-1</label>
    <input class="w3-input" type="text" name="board_name" required>
    </p>

    <label for="sel1">選擇店家</label>
    <select class="form-control" id="sel1" name="store_id">
        @foreach($stores as $store)
            <option value="{{ $store->id }}">{{ $store->name }}</option>
        @endforeach
    </select>

    <P>
    <label class="w3-label">截止時間</label>
    <input type="text" name="end_time" required>
    </P>

    <button class="w3-btn-block w3-teal">開團囉</button>
</form>


@endsection