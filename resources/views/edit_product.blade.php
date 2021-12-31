@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Chi tiết sản phẩm</h6>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('edit_product',['productid'=>$product->id])}}" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Tên sản phẩm:</label>
	    <div class="col">
	    	<input type="text" class="form-control border border-primary" name="productname" value="{{$product->product_name}}">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Loại:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="category">
		   		@foreach($categories as $c)
		   			@if($product->category->id == $c->id)
		   			<option value="{{$c->id}}"selected>{{$c->category_name}}</option>
			   		@else
			   		<option value="{{$c->id}}">{{$c->category_name}}</option>
			   		@endif
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Đơn giá:</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control border border-primary" name="price" 
	      		value="{{$product->price}}">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Đơn vị tính:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="unit">
		   		@foreach($units as $unit)
			   		@if($product->unit->id == $unit->id)
			   		<option value="{{$unit->id}}" selected>{{$unit->unit_name}}</option>
			   		@else
			   		<option value="{{$unit->id}}">{{$unit->unit_name}}</option>
			   		@endif
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Nhà sản xuất:</label>
	    <div class="col-sm-4">
	      <select class="form-control" name="manufacturer">
		   		@foreach($manufacturers as $m)
			   		@if($product->manufacturer->id == $m->id)
			   		<option value="{{$m->id}}" selected>{{$m->company_name}} ({{$m->country->country_name}})</option>
			   		@else
			   		<option value="{{$m->id}}">{{$m->company_name}} ({{$m->country->country_name}})</option>
			   		@endif
		   		@endforeach
		   </select>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Thành phần:</label>
	    <div class="col-sm-4">
		    <select multiple class="form-control" name="ingredients[]">
		    	@foreach($product->ingredients as $ig)
		    	<option value="{{$ig->id}}" selected>{{$ig->ingredient_name}}</option>
		    	@endforeach
		    	@foreach($ingredients as $ig)
		    		@if(!in_array($ig->id, $prod_ig))
			   		<option value="{{$ig->id}}">{{$ig->ingredient_name}}</option>
			   		@endif
			   	@endforeach
		    </select>
		</div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Ảnh:</label>
	    <div class="col-sm-4">
	    	<img src="storage/{{$product->image}}" height="150" 
		    	alt="product image"/>
	      <input type="file" class="form-control border border-primary mt-2" name="image">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label font-weight-bold">Mô tả:</label>
	    <div class="col">
	      <textarea class="form-control border border-primary" name="description">{{$product->description}}</textarea>
	    </div>
	  </div>
	  
	  <button type="submit" class="btn btn-primary mb-3">Lưu</button>
	</form>
</div>
@stop