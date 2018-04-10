<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href="https://www.google.com/maps/place/105+L%C3%A1ng+H%E1%BA%A1,+%C4%90%E1%BB%91ng+%C4%90a,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0124217,105.8101093,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab6217b72d3d:0x9d356afe0d288ce!8m2!3d21.0124167!4d105.812298"><i class="fa fa-home"></i> 25A, ngõ 105, Láng Hạ, Đống Đa, Hà Nội</a></li>
					<li><a href=""><i class="fa fa-phone"></i> Hỗ trợ: 0462.60.1996</a></li>
				</ul>
			</div>

			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="#"><i class="fa fa-user"></i>Chào {{Auth::user()->full_name}}</a></li>
						<li><a href="dangxuat">Đăng Xuất</a></li>
					@else
						<li><a href="dangky">Đăng kí</a></li>
						<li><a href="dangnhap">Đăng nhập</a></li>
					@endif
				</ul>
			</div>

			<div class="addthis_toolbox addthis_default_style ">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ec4ccd549bd47b3"></script>

		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="{{route('home')}}" id="logo"><img src="assets/dest/images/Village Bakery.jpg" width="150px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="post" id="searchform" action="search">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="text" value="" name="tukhoa" id="s" placeholder="Nhập từ khóa..." required />
						<button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session('cart')->totalQty}})
								<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach(Session('cart')->items as $product)
									<div class="cart-item">
										<a class="cart-item-delete" href="delcart/{{$product['item']['id']}}">
											<i class="fa fa-times"></i>
										</a>
										<div class="media">
											<a class="pull-left" href="product/{{$product['item']['id']}}">
												<img src="upload/product/{{$product['item']['image']}}" alt=""></a>
											<div class="media-body">
												<div class="cart-item-title">{{$product['item']['name']}}</div>
												@if($product['item']['promotion_price']>0)
													<div class="cart-item-amount">Đơn giá: <span>
											{{number_format($product['item']['promotion_price'])}} VNĐ
											</span></div>
												@else
													<div class="cart-item-amount">Đơn giá: <span>
											{{number_format($product['item']['unit_price'])}} VNĐ
											</span></div>
												@endif
												<div class="cart-item-options">Số lượng: {{$product['qty']." ".$product['item']['unit']}}</div>
											</div>
										</div>
									</div>
								@endforeach

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền:
										<span class="cart-total-value">{{number_format(Session('cart')->totalPrice)." VNĐ"}}
								</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					@endif
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="home">Trang chủ</a></li>
					<li><a>Sản phẩm</a>
						<ul class="sub-menu">
							@foreach($menu as $row_menu)
								<li><a href="category/{{$row_menu->id}}">{{$row_menu->name}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="news">Tin Tức</a></li>
					<li><a href="gioithieu">Giới thiệu</a></li>
					<li><a href="contact">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->
