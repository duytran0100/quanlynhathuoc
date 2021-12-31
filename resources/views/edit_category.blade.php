@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Sửa loại sản phẩm</h6>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('edit_category', ['categoryid'=>$category->id])}}">
		{{csrf_field()}}
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Tên loại sản phẩm:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="categoryname" value="{{$category->category_name}}">
	    </div>
	  </div>
	  <button type="submit" class="btn btn-primary mb-3">Lưu</button>
	</form>
</div>
@stop