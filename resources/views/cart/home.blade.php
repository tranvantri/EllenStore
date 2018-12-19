<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ellen</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="asset/css/reset.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="asset/css/animate.css">
	<link rel="stylesheet" href="asset/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="asset/fancybox-2.1.7/source/jquery.fancybox.css">
	<link rel="stylesheet" href="asset/css/myCss.css">
	<link rel="stylesheet" href="asset/css/media.css">

</head>
<body>
	
	<!-- Menutop -->
	<div class="menu-top">		
		<nav class="navbar-top">
			<div class="container">
				<button class="user-icon"><i class="fa fa-user" aria-hidden="true"></i></button>
				<a href="" class="logo"><img src="asset/images/logo.png" alt=""></a>
				<div class="content-navbar">
					<ul class="menu-group-category">
						<li>
							<a href="">Áo</a>
							<ul class="sub-menu">
								<li><a href="">Áo thun</a></li>
								<li><a href="">Áo khoác</a></li>
							</ul>
						</li>
						<li>
							<a href="">Quần</a>
							<ul class="sub-menu">
								<li><a href="">Quần short</a></li>
								<li><a href="">Quần què</a></li>
							</ul>
						</li>
						<li>
							<a href="">Váy</a>
							<ul class="sub-menu">
								<li><a href="">Váy Xòe</a></li>
								<li><a href="">Váy suông</a></li>
							</ul>
						</li>
						<li><a href="">Phụ kiện</a></li>
					</ul>
					<button class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i>{{Cart::count()}}</button>
					<ul class="login">
						<li><a href="">Đăng nhập</a></li>
						<li><a href="">Tạo tài khoản</a></li>
					</ul>
				</div>
			</div>					
		</nav>
		<nav class="navbar-top-mobile">	
			<div class="container">				
				<div class="content-navbar">
					<ul class="menu-group-category text-center">
						<li><a href="">Áo thun</a></li>
						<li><a href="">Áo khoác</a></li>
						<li><a href="">Áo sơ mi</a></li>
						<li><a href="">Quần short</a></li>
						<li><a href="">Quần què</a></li>
						<li><a href="">Quần jean</a></li>
						<li><a href="">Váy Xòe</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Phụ kiện</a></li>
					</ul>	 					
				</div>	
			</div>				
		</nav>			
	</div>
	<div class="nen-xam"></div>
	<div class="toggle-login">
		<ul>
			<li class="active"><a href="" class="logo"><img src="asset/images/logo.png" alt=""></a></li>
			<li><a href="" class="btn btn-primary btn-login">Đăng nhập</a></li>
			<li><a href="" class="btn btn-info btn-register">Tạo tài khoản</a></li>
		</ul>	
	</div>
	<div class="cart">
		<div class="cart-heading">
			<div class="cart-close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<h4 class="cart-title">Giỏ hàng<span>(0 sản phẩm)</span></h4>
		</div>
		<div class="cart-body">
			<div>
				@if(isset($content))
					@foreach($content as $cartItem)				
					<div class="cart-product">
						<div class="cart-product-img">
							<a href=""><img src="{{$cartItem->options->has('avatar')?$cartItem->options->avatar:''}}" alt=""></a>
						</div>
						<div class="cart-info">
							<div class="row">
								<div class="cart-name col-lg-12 col-md-12 col-sm-12">
									<a href="">{{$cartItem->name}}</a>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label class="cart-quantity">Số lượng:</label>
									<input type="number" name="" value="{{$cartItem->qty}}" class="form-control">
									<label class=""><strong>Size:</strong> {{$cartItem->options->has('size')? $cartItem->options->size : ''}}</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 text-right">
									<div class="cart-price">
										<span class="cart-retail-price">422.000₫</span>
										<span class="cart-sale-price">{{$cartItem->price}}</span>
									</div>
									<a href="" class="remove-product">Bỏ sản phẩm</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@endif
				
			</div>
			<hr>
			<div>
				<div class="row cart-sub-total">
					<div class="my-col-6">Thành tiền: {{Cart::total()}}</div>
					<div class="my-col-6 text-right"></div>
				</div>
				<div class="row">
					<div class="my-col-6">Bạn đã được giảm:</div>
					<div class="my-col-6 text-right"> Giá trị giảm ₫</div>
				</div>
			</div>
			<button class="cart-btn">Tiến hành đặt hàng</button>

			
		</div>		
	</div>
	<!-- endMenutop -->
	<div class="clearfix"></div>

	<section class="content">
		<div class="container">
			<div class="image-title row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<img class="card-img-top img-thumbnail" src="asset/images/anhquangcao/anhdepthoitrang.jpg" alt="Card image cap">
						<div class="card-body">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>							
									<li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
								</ol>
							</nav>						
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="gio-hang">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h3 class="gio-hang-title">Giỏ hàng</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
			<!-- <div class="empty">
				<div class="empty-content">Bạn chưa mua sản phẩm nào</br>Tiếp tục mua hàng <a href="">tại đây</a>
				</div>
			</div> -->	
			<div class="gio-hang-content">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
					<!-- <div class="col-lg-12 col-md-12 col-sm-6"> -->	
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<!-- bắt đầu phần giỏ hàng -->
								<div class="gio-hang-info">
									<div class="table-responsive">
										<table class="table table-bordered">
											<!-- bảng hiển thị danh sách các sản phẩm mà người dùng mua nè -->
											<thead>
												<tr>
													<th scope="col">Tên sản phẩm</th>
													<th scope="col">Hình ảnh</th>
													<th scope="col">Đơn giá</th>
													<th scope="col">Số lượng</th>
													<th scope="col">Size</th>
													<th scope="col">Thành tiền</th>
													<th scope="col">Xóa</th>
												</tr>
											</thead>
											<tbody>
												
											
													<!-- <input name="_token" type="hidden" 
													value="{!! csrf_token() !!}" > -->
													@if(isset($content))
														@foreach($content as $child)
														<tr>
															<th scope="row">{{$child->name}}</th>
															<td><img class="hinhAnhSanPham" src="{{$child->options->has('avatar')? 
																$child->options->avatar : ''}}" alt="" ></td>
															<td>{{$child->price}}</td>
															<td >
																<input type="number" style=" text-align: right;" name="qty"  value="{{$child->qty}}" class="form-control qty">
																
															</td>


															<td>{{$child->options->has('size')? $child->options->size : ''}}</td>
															<th>{{$child->price * $child->qty}}</th>
															<th>
																<a href="{!! url('xoa-san-pham',['id'=>$child->rowId]) !!}">Xóa</a>
															</th>
														</tr>
														@endforeach
													@endif
												
												<tr>
													<td>Tổng số lượng:</td>
													<td>{{Cart::count()}}</td>
													<td>Tổng tiền:</td>
													<td>{!! Cart::total() !!}VND</td>	
												</tr>

												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
					<!-- <div class="col-lg-12 col-md-12 col-sm-6"> -->
						<h3 class="order-title">Thông tin người mua/nhận hàng</h3>
						<div class="contact-form">
							<!-- <form> -->
								
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Tên người nhận"
										value="{{ ($user->name ?? '') }}" />		
									</div>
									<div class="form-group">		
										<input type="text" class="form-control" placeholder="Số điện thoại" 
										value="{{ ($user->phone ?? '') }}" />							
									</div>
									<div class="form-group">		
										<input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" value="{{ ($user->address ?? '') }}">
									</div>
									<div class="form-group">		
										<textarea class="form-control" placeholder="Ghi chú"></textarea>
									</div>
									<div class="hinh-thuc-thanh-toan">		
										<label><span>(*)</span>Hình thức thanh toán:&nbsp;</label>
										<span>Thanh toán sau khi nhận hàng.</span>
									</div>

									<a href="{{ route('cart.store') }}" ><button type="button" class="btn btn-block">Mua ngay</button></a>
								
							<!-- </form> -->
						</div>
					</div> <!-- end div thông tin liên hệ -->
				</div>
			</div>
		</div>
	</div>
</div> 
</div>
</div>

</section><!-- END CONTENT -->
<div class="clearfix"></div>
	@include('user.core.footer')
<div class="back-to-top">
	<i class="fa fa-angle-double-up" aria-hidden="true"></i>
</div>
<div class="search">
	<div class="icon-search-toggle icon-search-animate"><i class="fa fa-search" aria-hidden="true"></i></div>	
	<div class="search-box">
		<input type="text" placeholder="Nhập tên sản phẩm">
	</div>
	<div class="icon-search"><i class="fa fa-search" aria-hidden="true"></i></div>
</div>

	@include('user.libraries.jsCode')

</body>
</html>