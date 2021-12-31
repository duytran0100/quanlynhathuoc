@extends('layout')
@section('content')
<div class="container shadow p-3 mt-4 bg-light rounded">
	<div class="row">
	    @foreach($categories as $p)
		    <div class="col card m-3 rounded" id="{{$p->id}}">
		    	<a href="{{route('products_by_category',['category_id'=>$p->id])}}" style="text-decoration: none">
		    	<img class="card-img-top" src="storage/{{$p->product->first()->image}}" 
		    	alt="Card image" height="100" />
				<div class="card-body text-center text-dark">
				   	<p class="card-text font-weight-bold">{{$p->category_name}}</p>
				</div>
				</a>
			</div>
		@endforeach
	</div>
</div>
<div class="container shadow p-3 mt-4 bg-light rounded">
	<h4>Danh sách sản phẩm</h3>
	<h6 class="text-secondary font-italic">{{$products->first()->category->category_name}}</h6>
	<div class="row">
	    @foreach($products as $p)
		    <div class="col-sm-2 m-3 card rounded">
		    	<a href="{{route('get_product',['productid'=>$p->id])}}" style="text-decoration: none">
		    	<img class="card-img-top" src="storage/{{$p->image}}" height="80"
		    	alt="Card image" />
				<div class="card-body text-dark">
					@if(strlen($p->product_name) > 47)
					<p class="card-text text-sm-left">{{substr($p->product_name,0,47)}}...</p>
					@else
					<p class="card-text text-sm-left">{{$p->product_name}}</p>
				   	@endif
				   	<p class="card-text text-sm-left">@php echo number_format($p->price, 0); @endphp VNĐ / {{$p->unit->unit_name}}</p>
				</div>
				</a>
				<button class="btn btn-primary text-center mb-3">
					<i class="fas fa-cart-plus"></i> Thêm vào giỏ
				</button>
			</div>
		@endforeach
	</div>
	{{$products->links()}}
</div>
@stop