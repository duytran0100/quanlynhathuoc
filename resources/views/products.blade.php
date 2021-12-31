@extends('manage')
@section('main-content')
<div class="container-fluid mt-2">
	<h6 class="text-secondary font-italic">Danh mục sản phẩm</h6>
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
		<a href="{{route('add_product_view')}}" class="badge badge-primary mb-2 p-2">Thêm sản phẩm</a>
	</div>
	{{$products->links()}}
	<table class="table table-hover table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">Tên sản phẩm</th>
	      <th scope="col">Đơn giá</th>
	      <th scope="col">Đơn vị tính</th>
	      <th scope="col">Loại sản phẩm</th>
	      <th scope="col">Nhà sản xuất</th>
	      <th scope="col">Ảnh</th>
	      <th scope="col">#</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($products as $p)
	    <tr>
	    	<td>{{$p->product_name}}</td>
	 		<td>@php echo number_format($p->price, 0); @endphp</td>
	 		<td>{{$p->unit->unit_name}}</td>
	 		<td>{{$p->category->category_name}}</td>
	 		<td>{{$p->manufacturer->company_name}}</td>
	 		<td>
	 			<img src="storage/{{$p->image}}" height="80"
		    	alt="product image" />
	 		</td>
	 		<td>
	 			<a href="{{route('edit_product_view',['productid'=>$p->id])}}" class="badge badge-info">Xem</a>
	 			<a href="{{route('delete_product',['productid'=>$p->id])}}" class="badge badge-danger">Xóa</a>
	 		</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>
@stop