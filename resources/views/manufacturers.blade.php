@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Danh mục nhà sản xuất</h6>
	@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
	@endif

	@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
	@endif
	
	<div class="text-right">
		<a href="{{route('add_manufacturer_view')}}" class="badge badge-primary mb-2 p-2">Thêm nhà sản xuất</a>
	</div>
	<table class="table table-hover table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">Tên công ty</th>
	      <th scope="col">Nước</th>
	      <th scope="col">Địa chỉ</th>
	      <th scope="col">Danh sách sản phẩm</th>
	      <th scope="col">#</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($manufacturers as $m)
	  	<tr>
	  		<td>{{$m->company_name}}</td>
	  		<td>{{$m->country->country_name}}</td>
	  		<td>{{$m->address}}</td>
	  		<td>
	  		@foreach($m->products as $p)
	  		<ul>
	  		@if(strlen($p->product_name) > 47)	
	  			<li>{{substr($p->product_name,0,47)}}...</li>
	  		@else
	  			<li>{{$p->product_name}}</li>
	  		@endif
	  		</ul>
	  		@endforeach
	  		</td>
	  		<td>
	 			<a href="{{route('edit_manufacturer_view',['manufacturerid'=>$m->id])}}" 
	 				class="badge badge-info">Xem</a>
	 			<a href="{{route('delete_manufacturer',['manufacturerid'=>$m->id])}}" 
	 				class="badge badge-danger">Xóa</a>
	 		</td>
	  	</tr>
	  	@endforeach
	  </tbody>
	</table>
</div>
@stop