<div class="cart">
		<div class="cart-heading">
			<div class="cart-close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<h4 class="cart-title">Giỏ hàng<span>(0 sản phẩm)</span></h4>
		</div>
		<div class="cart-body">
			<div>
				@if(isset($cartItems))

				@foreach($cartItems as $cartItem)				
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

				@else
					Giỏ hàng của bạn trống!
				@endif
			</div>
			<hr>
			<div>
				<div class="row cart-sub-total">
					<div class="my-col-6">Thành tiền:</div>
					<div class="my-col-6 text-right">
					@if(isset($cartItems))
						{{Cart::total()}}
					@else
						0.0
					@endif
					</div>
				</div>
				<div class="row">
					@if(isset($cartItems))
						<div class="my-col-6">Bạn đã được giảm:</div>
						<div class="my-col-6 text-right">1.307.000₫</div>
					@else
						
					@endif
				</div>
			</div>
			@if(isset($cartItems))
			<button class="cart-btn">Tiến hành đặt hàng</button>
			@endif

			
		</div>		
	</div>