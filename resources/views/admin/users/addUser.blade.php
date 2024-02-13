@extends('layouts.adminPages')
@section('content')
<div class="x_content">
		<br />
		<form action="{{route('storeUser')}} " method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
@csrf
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" id="first-name" required="required" class="form-control " name="fullName" value="{{old('fullName')}}">
					<div style="color : red;">
					@error('fullName')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" id="user-name"  required="required" class="form-control" name="userName" value="{{old('userName')}}">
					<div style="color : red;">
					@error('userName')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="email" class="form-control" type="email" name="email" required="required" name="email" value="{{old('email')}}">
					<div style="color : red;">
					@error('email')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="flat" name="active" @checked( old('active'))>
					</label>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="password" id="password" name="password" required="required" class="form-control" name="password">
					<div style="color : red;">
					@error('password')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="ln_solid"></div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<button class="btn btn-primary" type="button"><a href="{{route('user')}}">Cancel</a></button>
					<button type="submit" class="btn btn-success">Add</button>
				</div>
			</div>

		</form>
	</div>
</div>
</div>
</div>

</div>
</div>
			<!-- /page content -->

@endsection
@section('type')
Manage Users
@endsection
@section('title')
Add User
@endsection