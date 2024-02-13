<!DOCTYPE html>
<html lang="en">
  <head>
	@include('admin.includes.head')
</head>

<body class="nav-md">
	
@include('admin.includes.menu')
@include('admin.includes.sidebar')				
@include('admin.includes.menufooter')
@include('admin.includes.navigation')					

@include('admin.includes.content')			
			@yield('content')
							
			<!-- /page content -->

            @include('admin.includes.footer')	

            @include('admin.includes.js')

</body></html>
