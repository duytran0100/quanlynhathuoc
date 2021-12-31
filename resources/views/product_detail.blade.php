@extends('layout')
@section('content')
<div class="container shadow p-3 mt-4 bg-light rounded">
	<div class="row">
		<div class="col-sm-5 border-right border-dark text-center">
			<img src="storage/{{$product->image}}" alt="Product Image" height="300" width="250">
		</div>
		<div class="col-sm-7">
			<h4 class="text-primary">{{$product->product_name}}</h4>
			<hr>
			<h5>Đơn giá: @php echo number_format($product->price, 0).' VNĐ'; @endphp / {{$product->unit->unit_name}}</h5>
			<dl>
				<dt>Danh mục:</dt>
				<dd>
					<a href="{{route('products_by_category',['category_id'=>$product->category->id])}}">
						{{$product->category->category_name}}
					</a>
				</dd>

				<dt>Mô tả:</dt>
				<dd>{{$product->description}}</dd>

				@if($product->ingredients->count() != 0)
				<dt>Thành phần:</dt>
					@foreach($product->ingredients as $ingredient)
					<dd>{{$ingredient->ingredient_name}}</dd>
					@endforeach
				@endif

				<dt>Nhà sản xuất:</dt>
				<dd>{{$product->manufacturer->company_name}}</dd>

				<dt>Nước sản xuất:</dt>
				<dd>{{$product->manufacturer->country->country_name}}</dd>
			</dl>
			<a class="btn btn-primary" href="#"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</a>
			<a class="btn btn-danger" href="#">Tiếp tục mua hàng</a>
		</div>
	</div>
</div>
@stop