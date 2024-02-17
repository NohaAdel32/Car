@extends('layouts.app')

@section('content')
<div class="login_wrapper">
        <div class="animate form login_form">
        @if(session('error'))
            <div class="alert alert-danger">
            {{session('error')}}
            </div>
            @endif
            @if ($errors->has('userName'))
    <span class="text-danger">{{ $errors->first('userName') }}</span>
      @endif
            
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" placeholder="Username" class="form-control" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus />
                @error('userName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror  
            </div>
              <div>
                <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror  
            </div>
              <div>
              <button type="submit" class="btn btn-primary">Log in</button>
              @if (Route::has('password.request'))
                 <a class="btn btn-link" href="{{ route('password.request') }}">Lost your password?</a>
                 @endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        @endsection