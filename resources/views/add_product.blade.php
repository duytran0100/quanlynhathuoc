@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Thêm sản phẩm</h6>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('add_product')}}" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Tên sản phẩm:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="productname">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Loại:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="category">
		   		@foreach($categories as $c)
		   		<option value="{{$c->id}}">{{$c->category_name}}</option>
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Đơn giá:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="price">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Đơn vị tính:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="unit">
		   		@foreach($units as $unit)
		   		<option value="{{$unit->id}}">{{$unit->unit_name}}</option>
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Nhà sản xuất:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="manufacturer">
		   		@foreach($manufacturers as $m)
		   		<option value="{{$m->id}}">{{$m->company_name}} ({{$m->country->country_name}})</option>
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Thành phần:</label>
	    <div class="col-sm-4">
		    <select multiple class="form-control" name="ingredients[]">
		      	@foreach($ingredients as $ig)
		   		<option value="{{$ig->id}}">{{$ig->ingredient_name}}</option>
		   		@endforeach
		    </select>
		</div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Ảnh:</label>
	    <div class="col-sm-4">
	      <input type="file" class="form-control border border-primary" name="image">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Mô tả:</label>
	    <div class="col-sm-4">
	      <textarea class="form-control border border-primary" name="description"></textarea>
	    </div>
	  </div>
	  
	  <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
	</form>
</div>
@stop