<!doctype html>
<html lang="en">

  <head>
   @include('includes.head')

  </head>

  <body>

    
  @include('includes.spinner')
     
     @include('includes.navbar') 
      
      <div class="hero" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
          
    @include('includes.search') 
    @include('includes.howWork')
    @include('includes.carlisting')
    @include('includes.features')
    @include('includes.testimonial')
    @include('includes.rent')
    @include('includes.footer')
    @include('includes.js')

  </body>

</html>

