@extends('layouts.adminPages')
@section('content')
<div class="x_content">
<br />
<form action="{{route('updateTesti', $testi->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
@csrf
@method('put')
<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" id="name" required="required" class="form-control " name="name" value="{{$testi->name}}">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Position <span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" id="position" required="required" class="form-control " name="position" value="{{$testi->position}}">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 ">
			<textarea id="content" name="content" required="required" class="form-control">{{$testi->content}}</textarea>
		</div>
	</div>
	
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="flat" name="published" @checked($testi->published)>
			</label>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span>*</span>
		</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="file" id="image" name="image"  class="form-control">
			<br>
		<img src="{{ asset('assets/images/'.$testi->image) }}" alt="{{$testi->name}}" style="width:200px;">
		</div>
	</div>
	<input type="hidden" value="{{ asset('assets/images/'.$testi->image) }}" name="oldImage">
	<div class="ln_solid"></div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<button class="btn btn-primary" type="button"><a href="{{route('Testi')}}">Cancel</a></button>
			<button type="submit" class="btn btn-success">Edit</button>
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
Manage Testimonials
@endsection
@section('title')
Edit Testimonial
@endsection