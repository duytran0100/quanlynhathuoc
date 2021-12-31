<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <base href="{{asset('')}}">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-xl bg-primary navbar-dark">
		  <a class="navbar-brand" href="#"><i class="fas fa-clinic-medical"></i> Tiệm thuốc</a>
		  <form class="form-inline mx-auto">
		    <input class="form-control mr-sm-2" type="text" placeholder="Nhập từ khóa tìm kiếm">
		    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
		  </form>
		  <ul class="navbar-nav mr-5">
		    <li class="nav-item">
		      <a class="nav-link text-light" href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
		    </li>
		    @if(Auth::user())
		    <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
			    <div class="dropdown-menu">
			      <a class="dropdown-item" href="/manage">Quản lý</a>
			      <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
			      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							    @csrf
						</form>
			    </div>
			  </li>
		    @else
		    	<li class="nav-item">
		      <a class="nav-link text-light" href="{{ route('login') }}"><i class="fas fa-user"></i> Đăng nhập</a>
		    	</li>
		    	<li class="nav-item">
		      <a class="nav-link text-light" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> 							Đăng kí</a>
		    	</li>
		    @endif
		  </ul>
	</nav>
	<div class="container-fluid">
		@yield('content')
	</div>
</body>
</html>
