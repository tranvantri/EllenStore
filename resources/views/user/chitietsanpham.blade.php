<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ellen</title>

	@include('user.libraries.cssCode')
</head>
<body>

<!-- Menutop -->
	@include('user.core.menutop')
	<div class="nen-xam"></div>

	<!-- 2 nút sign in và sign up -->
	@include('user.core.loginUser')

	<!-- model hiển thị danh sách các sản phẩm trong giỏ hàng -->
	@include('user.core.modelCart')
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
								<li class="breadcrumb-item"><a href="#">Sản phẩm áo</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sản phẩm tào lao</li>
							</ol>
						</nav>						
					</div>
				</div>
			</div>
		</div>

		<div class="san-pham row">
			<div class="col-lg-5 col-md-5 col-sm-5">
				<div class="anh-sp row justify-content-center">					
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="image-product owl-carousel text-center">
							<a data-hash="1" rel="image-pro" href="asset/images/anh_sp/1.jpg"><img class="img-thumbnail" src="asset/images/anh_sp/1.jpg" alt=""></a>
							<a data-hash="2" rel="image-pro" href="asset/images/anh_sp/2.jpg"><img class="img-thumbnail" src="asset/images/anh_sp/2.jpg" alt=""></a>
							<a data-hash="3" rel="image-pro" href="asset/images/anh_sp/3.jpg"><img class="img-thumbnail" src="asset/images/anh_sp/3.jpg" alt=""></a>
						</div>
					</div>					
				</div>
				<div class="other-image-product row justify-content-center">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<ul class="owl-carousel">
							<li><a href="#1"><img class="img-thumbnail" src="asset/images/anh_sp/1.jpg" alt=""></a></li>
							<li><a href="#2"><img class="img-thumbnail" src="asset/images/anh_sp/2.jpg" alt=""></a></li>
							<li><a href="#3"><img class="img-thumbnail" src="asset/images/anh_sp/3.jpg" alt=""></a></li>

						</ul>	

					</div>		
				</div>	
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7">
				<div class="pro-content row">					
					<div class="col-lg-12 col-md-12 col-sm-12">
						@foreach($product as $child)
						<div class="pro-name row">{{$child->name}}</div>
						<div class="pro-price row">
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span class="gia card-link">{{$child->price}}<span class="don-vi-tien">đ</span></span>
						</div>
						<div class="pro-desc row"></div>
						<div class="row">
							<form class="form-select">
								<div class="form-group">
									<div class="pro-properties-text">Màu sắc</div>
									<div class="pro-properties form-check form-check-inline">
										<input class="input-check form-check-input" type="radio" id="inlineCheckbox1" value="option1" checked name="mausac">
										<label class="color-name form-check-label active" for="inlineCheckbox1">đỏ</label>
										<img class="img-check active" src="asset/images/icons/select-pro.png" alt="">
									</div>
									<div class="pro-properties form-check form-check-inline">
										<input class="input-check form-check-input" type="radio" id="inlineCheckbox2" value="option2" name="mausac">
										<label class="color-name form-check-label" for="inlineCheckbox2">vàng</label>
										<img class="img-check" src="asset/images/icons/select-pro.png" alt="">
									</div>						

								</div>					
								<div class="form-group">
									<div class="pro-properties-text">Kích thước</div>
									<div class="pro-properties form-check form-check-inline">
										<input class="input-check form-check-input" type="radio" id="inlineCheckbox3" value="option1" checked name="kichthuoc">
										<label class="size-name form-check-label active" for="inlineCheckbox3">m</label>
										<img class="img-check active" src="asset/images/icons/select-pro.png" alt="">
									</div>
									<div class="pro-properties form-check form-check-inline">
										<input class="input-check form-check-input" type="radio" id="inlineCheckbox4" value="option2" name="kichthuoc">
										<label class="size-name form-check-label" for="inlineCheckbox4">l</label>
										<img class="img-check" src="asset/images/icons/select-pro.png" alt="">
									</div>						

								</div>
								<div class="pro-properties-number form-group">
									<div class="pro-properties-text">Số lượng</div>
									<div class="group-input-number">
										<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
										<input type="number" class="input-number form-control" min="1" value="1" id="soluong">
										<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
									</div>
								</div>
								<a href="{{route('cart.edit',$child->id)}}" ><button type="button" class="btn add-gio-hang ">Thêm vào giỏ hàng</button></a>
								<button type="button" class="btn mua-ngay">Mua ngay</button>
							</form>
						</div>
						@endforeach
					</div>					
				</div>
			</div>
		</div> 

		<div class="mo-ta row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="btn-list row">
					<span class="btn btn-mo-ta active">Mô tả</span>
					<span class="btn btn-comment-fb">Bình luận</span>
				</div>
				<div class="row">
					<div class="mo-ta-content active col-lg-12 col-md-12 col-sm-12">
						Bacon ipsum dolor amet kielbasa pancetta shank beef ribs pork. Short loin beef pork chop landjaeger beef ribs brisket jerky short ribs. Ham doner shoulder meatloaf, andouille alcatra chuck short loin hamburger venison beef ground round tenderloin ham hock t-bone. Ground round rump ball tip frankfurter turkey.

						Turkey pancetta porchetta biltong alcatra, pork chop salami t-bone shankle bresaola tail buffalo brisket. Turducken bresaola cupim tenderloin pig, kielbasa shank filet mignon. Pork belly swine fatback, pork spare ribs picanha jerky ball tip cow sausage shank pork loin ribeye prosciutto capicola. Landjaeger andouille frankfurter pork belly cupim short ribs sirloin. Shank swine capicola biltong. Beef bresaola pork chop, leberkas prosciutto tongue turducken t-bone shankle brisket porchetta pig venison.

						Bresaola alcatra beef ribs hamburger tail. Sausage strip steak fatback chicken meatloaf tri-tip. Swine leberkas alcatra, ham venison pig tenderloin short loin doner strip steak turducken. Pastrami buffalo turkey pancetta, venison tenderloin tri-tip bacon. Pork loin kevin turkey beef ribs pork belly boudin ground round pancetta pig capicola cow drumstick kielbasa sausage. Beef tail pig, turducken ground round shoulder sirloin.

						Leberkas pork rump pancetta. Spare ribs pork chicken, tri-tip sirloin ground round ribeye jerky chuck sausage capicola pastrami. Tenderloin brisket beef ribs jowl short loin short ribs. Ham hock short ribs boudin shankle ham bresaola, cupim buffalo cow. Tongue pork belly alcatra burgdoggen pork. Rump pig jowl meatloaf salami filet mignon sausage cow kevin venison.

						Short loin tenderloin pork chop pork loin short ribs meatball turkey rump. Kielbasa fatback andouille swine, shankle landjaeger pork. Hamburger landjaeger sirloin pancetta pork belly, frankfurter ball tip spare ribs drumstick pastrami leberkas rump tri-tip. Tail ribeye rump pork, fatback beef ham hock. Jerky fatback cupim swine pork tenderloin porchetta tail hamburger corned beef rump shoulder short ribs beef ribs pork chop.
					</div>
					<div class="binh-luan-fb col-lg-12 col-md-12 col-sm-12">
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="mot-danhmuc row">
			<!-- Danh sách các sản phẩm gần đây khách hàng xem -->
			@include('user.core.spXemGanDay')
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

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>	

	<!-- End WOWSlider.com HEAD section -->
	<script type="text/javascript" src="asset/js/popper.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="asset/js/myJs.js"></script>
	<script type="text/javascript" src="asset/fancybox-2.1.7/lib/jquery.mousewheel.pack.js"></script>
	<script type="text/javascript" src="asset/fancybox-2.1.7/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="asset/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<!-- FB -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>