<!doctype html>
<html lang="en">

  <head>
   @include('includes.head')

  </head>

  <body>

  @include('includes.spinner')
     
     @include('includes.navbar') 
      <div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
      @if(Request::route()->getName() != 'single')
      @include('includes.header')
      @endif
      @yield('content')
      
   @include('includes.footer')
    @include('includes.js')

  </body>

</html>
