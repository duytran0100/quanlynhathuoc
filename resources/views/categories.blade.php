@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Danh mục loại sản phẩm </h6>
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
		<a href="{{route('add_category_view')}}" class="badge badge-primary mb-2 p-2">Thêm loại sản phẩm</a>
	</div>
	<table class="table table-hover table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">Loại sản phẩm</th>
	      <th scope="col">Danh sách sản phẩm</th>
	      <th scope="col">#</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($categories as $c)
	    <tr>
	    	<td>{{$c->category_name}}</td>
	 		<td>
	 			<ul>
	 			@foreach($c->product as $p)
	 				<li>{{$p->product_name}}</li>
	 			@endforeach
	 			</ul>
	 		</td>
	 		<td>
	 			<a href="{{route('edit_category_view',['categoryid'=>$c->id])}}" class="badge badge-info">Xem</a>
	 			<a href="{{route('delete_category',['categoryid'=>$c->id])}}" class="badge badge-danger">Xóa</a>
	 		</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>
@stop