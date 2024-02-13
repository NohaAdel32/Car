@extends('layouts.adminPages')
@section('content')
<div class="x_content">
	<br />
	<form action ="{{route('storeCat')}}" method="post"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
@csrf
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Add Category <span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" id="add-category" required="required" class="form-control " name="category" value="{{old('category')}}">
				<div style="color : red;">
					@error('category')
                      {{$message}}
                    @enderror</div>
			</div>
		</div>
		
		<div class="ln_solid"></div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<button class="btn btn-primary" type="button"><a href="{{route('category')}}">Cancel</a></button>
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
Manage Categories
@endsection
@section('title')
Add Category
@endsection