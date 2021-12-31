@extends('layout')
@section('content')
	<div class="container bg-light">
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
		  <!-- Brand/logo -->
		  <a class="navbar-brand" href="manage">Dashboard</a>
		  
		  <!-- Links -->
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link" href="manage/categories">Loại sản phẩm</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="manage/products">Sản phẩm</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="manage/manufacturers">Nhà sản xuất</a>
		    </li>
		  </ul>
		</nav>
		@yield('main-content')
	</div>
@stop