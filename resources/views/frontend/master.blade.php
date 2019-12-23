<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
    <base href="{{asset('public/frontend')}}/">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title> Shop Di Động - @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>

	<style>
		.login 
		{
			float: right;
			margin: 38px;
			font-size: 17px;
		}

		.col-md-6 
		{
			-ms-flex: 0 0 50%;
			flex: 0 0 50%;
			max-width: 50%;
			padding-left: 10%;
		}
		div#signup 
		{
			float: right;
			padding-left: 80px;
			padding-top: 42px;
			font-size: 17px;
		}
	</style>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="login">
		<a class="display" href="{{asset('login')}}">Log in</a>
		</div>
		
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-2 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img src="img/home/logofpt.png" height="60px"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-6 col-sm-12 col-xs-12">
					<form action="{{asset('search/')}}" method="GET">
						<input type="text" name="result" placeholder="Nhập từ khóa ...">
						<input type="submit" name="submit" value="Tìm Kiếm">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>				    
				</div>
				<div id="signup" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('register')}}">Sign up</a>									    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
                            <li class="menu-item">danh mục sản phẩm</li>
                            @foreach($category as $item)
                            <li class="menu-item"><a href="{{asset('category/'.$item->cate_id)}}" title="">{{$item->cate_name}}</a></li>
                            @endforeach						
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
                    </div>
                    
                    {{-- wrap --}}
                    @yield('main')
                    	
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="#"><img src="img/home/logofpt.png" height="100px"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Trường Đại học Công nghệ Thông tin là một trung tâm đào tạo đại học, sau đại học cung cấp nguồn nhân lực chất lượng cao, nhằm đáp ứng nhu cầu của thị trường lao động và phục vụ cộng đồng.

							- Trường Đại học Công nghệ Thông tin là một trung tâm hàng đầu về nghiên cứu khoa học và chuyển giao công nghệ về công nghệ thông tin – truyền thông và các lĩnh vực liên quan.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (028) 372 52002</p>
						<p>Email: info@uit.edu.vn</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Khu phố 6, P.Linh Trung, Q.Thủ Đức, Tp.Hồ Chí Minh.</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Trường Đại học Công nghệ Thông tin, Đại học Quốc gia Thành phố Hồ Chí Minh</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2006 uit.edu.vn</p>
						</div>
					</div>
				</div>
				<!-- <div id="scroll">
					<a href="#"><img src="img/home/scroll.png"></a>
				</div>	 -->

			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>