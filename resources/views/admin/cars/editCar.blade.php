@extends('layouts.adminPages')
@section('content')
<div class="x_content">
		<br />
		<form action="{{route('updateCars',$cars->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
		@csrf	
		@method('put')
		<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" id="title" required="required" class="form-control " name="title" value="{{$cars->title}}">
					<div style="color : red;">
					@error('title')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<textarea id="content" name="content" required="required" class="form-control">{{$cars->content}}</textarea>
					<div style="color : red;">
					@error('content')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="luggage" class="form-control" type="number" name="luggage" required="required" value="{{$cars->luggage}}">
					<div style="color : red;">
					@error('luggage')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="doors" class="form-control" type="number" name="doors" required="required" value="{{$cars->doors}}">
					<div style="color : red;">
					@error('doors')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="passengers" class="form-control" type="number" name="passengers" required="required" value="{{$cars->passengers}}">
					<div style="color : red;">
					@error('passengers')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 ">
					<input id="price" class="form-control" type="number" name="price" required="required" value ="{{$cars->price}}">
					<div style="color : red;">
					@error('price')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="flat" name="active" @checked($cars->active)>
					</label>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="file" id="image" name="image"  class="form-control" value="{{asset('uploads/'.$cars->image)}}">
					<img src="{{asset('uploads/'.$cars->image)}}" alt="{{$cars->title}}" style="width: 300px;">
					<div style="color : red;">
					@error('image')
                      {{$message}}
                    @enderror</div>
				</div>
				<input type="hidden" value="{{asset('uploads/'.$cars->image)}}" name="oldImage">
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 ">
					<select class="form-control" name="cat_id" id="">
						@foreach($category as $cat)
						<option value="{{$cat->id}}" @selected($cat->id == $cars->cat_id)>{{$cat->category}}</option>
						@endforeach
					</select>
					<div style="color : red;">
					@error('cat_id')
                      {{$message}}
                    @enderror</div>
				</div>
			</div>
			<div class="ln_solid"></div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<button class="btn btn-primary" type="button"><a href="{{route('car')}}">Cancel</a></button>
					<button type="submit" class="btn btn-success">Update</button>
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
Manage Cars
@endsection
@section('title')
Edit Car
@endsection