@extends('layouts.main')
@section('title','logout')
@section('content')
<form class="w3-container" role="form" method="POST" action="{{ url('/register') }}">
{{ csrf_field() }}

    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Name</label>
        <input id="name" type="text" class="w3-input w3-border" name="name" value="{{ old('name') }}" autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif   
    </div>

    
                           
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">E-Mail Address</label>
        <input id="email" type="email" class="w3-input w3-border" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Password</label>
        <input id="password" type="password" class="w3-input w3-border" name="password">

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>


    
    <div class="w3-input-group">                            
        <label for="password-confirm" class="w3-label w3-text-blue">Confirm Password</label>
        <input id="password-confirm" type="password" class="w3-input w3-border" name="password_confirmation">

        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>

    

    <div class="w3-input-group">                      
    <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
@endsection
