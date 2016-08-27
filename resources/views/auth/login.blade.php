@extends('layouts.main')
@section('title','Login')
@section('content')
<form class="w3-container" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="w3-input-group">
        <label for="email" class="w3-label w3-text-blue">E-Mail Address</label>
        <input id="email" type="email" class="w3-input w3-border" name="email" value="{{ old('email') }}" autofocus>
    </div>
    @if ($errors->has('email'))

    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>

    @endif  

    <div class="w3-input-group">
        <label for="password" class="w3-label w3-text-blue">Password</label>
        <input id="password" type="password" class="w3-input w3-border" name="password">
    </div>

    @if ($errors->has('password'))

    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>

    @endif     

    <div class="w3-input-group">
        <input type="checkbox" name="remember"> Remember Me 
    </div> 

    <div class="w3-input-group">
        <button type="submit" class="w3-btn w3-blue">Login</button>
        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>                            
</form>
@endsection
