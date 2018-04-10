@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản Phẩm Mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($newproduct)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($newproduct as $row_news)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product/{{$row_news->id}}"><img src="upload/product/{{$row_news->image}}" alt="{{$row_news->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$row_news->name}}</p>
										@if($row_news->promotion_price == 0)
											<p class="single-item-price"><span>{{number_format($row_news->unit_price)}} VNĐ</span>
											</p>
										@endif
										@if($row_news->promotion_price > 0)
											<p class="single-item-price">
												<span class="flash-del">{{number_format($row_news->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($row_news->promotion_price)}} VNĐ</span>
											</p>
										@endif
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addcart/{{$row_news->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product/{{$row_news->id}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$newproduct->links()}}</div>

					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="space50">&nbsp;</div>

					{{--Banner quảng cáo--}}
					<div class="img-banner effect">
						<a href="{{ route('home') }}">
							<img src="//hstatic.net/153/1000104153/1000145997/product_banner.png?v=656" alt="Adv Banner" class="img-responsive" >
						</a>
					</div>

					<div class="beta-products-list">
						<h4>Sản Phẩm Khuyến Mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($topproduct)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($topproduct as $row_top)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product/{{$row_top->id}}"><img src="upload/product/{{$row_top->image}}" alt="{{$row_top->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$row_top->name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{number_format($row_top->unit_price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($row_top->promotion_price)}} VNĐ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addcart/{{$row_top->id}}">
											<i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product/{{$row_top->id}}">Chi Tiết
											<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$topproduct->links()}}</div>
					</div> <!-- .beta-products-list -->

					<script lang="javascript">var _vc_data = {id : 3775176, secret : 'aaf1567caa80f27bb0f19bfa2b45627d'};
						(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.src = '//live.vnpgroup.net/client/tracking.js';
						var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
					</script>

				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
	<!-- Chạy quảng cáo 2 bên -->
	<!--Quang cao -->
	<div id="divQCRight" style="display: none; position: absolute; top: 0px">
		<a href="https://www.pinterest.com/pin/346355027573337010/?autologin=true"><img src="https://s-media-cache-ak0.pinimg.com/originals/6a/95/4f/6a954f7e4675f260d0d8028903e6c5d5.jpg" width="130"  /></a>
	</div>
	<div id="divQCLeft" style="display: none; position: absolute; top: 0px">
		<a href="http://trantravel.com.vn/du-lich-thai-lan-5-ngay-4-dem/"><img src="http://trantravel.com.vn/wp-content/uploads/2016/05/Banner-ve-may-bay.jpg" width="130" /></a>
	</div>
	<script type='text/javascript'>
        //<![CDATA[
        function FloatTopDiv()
        {
            startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftQCjust , startLY = TopQCjust+80;
            startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightQCjust , startRY = TopQCjust+80;
            var d = document;
            function ml(id)
            {
                var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                el.x = startRX;
                el.y = startRY;
                return el;
            }
            function m2(id)
            {
                var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                e2.x = startLX;
                e2.y = startLY;
                return e2;
            }
            window.stayTopLeft=function()
            {
                if (document.documentElement && document.documentElement.scrollTop)
                    var pY =  document.documentElement.scrollTop;
                else if (document.body)
                    var pY =  document.body.scrollTop;
                if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else  {startLY = TopQCjust;startRY = TopQCjust;};
                ftlObj.y += (pY+startRY-ftlObj.y)/16;
                ftlObj.sP(ftlObj.x, ftlObj.y);
                ftlObj2.y += (pY+startLY-ftlObj2.y)/16;
                ftlObj2.sP(ftlObj2.x, ftlObj2.y);
                setTimeout("stayTopLeft()", 1);
            }
            ftlObj = ml("divQCRight");
            //stayTopLeft();
            ftlObj2 = m2("divQCLeft");
            stayTopLeft();
        }
        function ShowQCDiv()
        {
            var objQCDivRight = document.getElementById("divQCRight");
            var objQCDivLeft = document.getElementById("divQCLeft");
            if (document.body.clientWidth < 1000)
            {
                objQCDivRight .style.display = "none";
                objQCDivLeft.style.display = "none";
            }
            else
            {
                objQCDivRight.style.display = "block";
                objQCDivLeft.style.display = "block";
                FloatTopDiv();
            }
        }
        //]]>
	</script>
	<script type='text/javascript'>
        //<![CDATA[
        document.write("<script type='text/javascript' language='javascript'>MainContentW = 1160;LeftBannerW = 125;RightBannerW = 125;LeftQCjust = 25;RightQCjust = 25;TopQCjust = 70;ShowQCDiv();window.onresize=ShowQCDiv;;<\/script>");
        //]]>
	</script>
</div> <!-- .container -->
@endsection
