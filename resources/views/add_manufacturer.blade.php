@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Thêm nhà sản xuất</h6>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('add_manufacturer')}}">
		{{csrf_field()}}
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Tên công ty:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="companyname">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Nước:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="country">
		   		@foreach($countries as $c)
		   		<option value="{{$c->id}}">{{$c->country_name}}</option>
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Địa chỉ:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="address">
	    </div>
	  </div>
	  <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
	</form>
</div>
@stop