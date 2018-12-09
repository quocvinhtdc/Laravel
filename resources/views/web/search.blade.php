@extends('web.masterpage.master');
@section('content');

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Men's <span>Wear  </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Men's Wear</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

<style type="text/css">
	.search {

	}
</style>

<div class="search">
	
	@if(count($prod) == 0)	
		<li>KHÔNG TÌM THẤY SẢN PHẨM NÀO!</li>
	@else
		<li>Tổng Số sản phẩm tìm được: {{ $prod->total() }}</li>
	@endif
</div>

		@foreach ($prod as $product)
		<div class="single-pro">
	 
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{ asset('images/'.$product->image) }}" alt="" class="pro-image-front">
					<img src="{{ asset('images/'.$product->image) }}" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="{{ asset('detail/' . $product->id) }}" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
											
				</div>
						<div class="item-info-product ">
										<h4><a href="single.html">{{ $product->name }}</a></h4>
										<div class="info-product-price">
											<span class="item_price">${{ $product->price }}</span>
											<del>$69.71</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<fieldset>
																	<a href="{{ route('shopingcart',[$product->id]) }}">		

																		<input type="submit" name="submit" value="Add to cart" class="button">
											
										</a>
																</fieldset>
														</div>
													</div>
				</div>
			</div>

			
	@endforeach
						
							<div class="clearfix"></div>
		</div>
		</div>
	
</div>

	 {{ $prod->appends(['key' => $key])->links() }}
	
	


<!-- //mens -->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
@endsection



