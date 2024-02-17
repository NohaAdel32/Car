@extends('layouts.app')

@section('content')
<div id="register" class="login_wrapper">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text"  placeholder="Fullname" class="form-control @error('fullName') is-invalid @enderror" name="fullName" value="{{ old('fullName') }}" required autocomplete="fullName" autofocus />
                @error('fullName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  
            </div>
              <div>
                <input type="text" class="form-control  @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" placeholder="Username"  />
                @error('userName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  
            </div>
              <div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"  />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  
            </div>
              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"  />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
            </div>
              <div>
              <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
               
                  <a href="{{ route('login') }}" class="to_register"> Log in </a>
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
      </div>
                @endsection