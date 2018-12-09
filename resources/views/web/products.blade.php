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

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div class="filter-price">
				<h3>Filter By <span>Price</span></h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
			</div>
			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
				<?php
						use App\Category;
						$categoryObj = new Category();
						$categories = $categoryObj->getCategory();
					?>
					@foreach ($categories as $category)
					<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ $category->name }}</label>

						<?php $subCategories = $category->childs; ?>
						
						<ul>
							@foreach ($subCategories as $subCategory)
							<li><input type="checkbox"  id="item-2-0" /><label for="item-2-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="{{ asset('category/' . $subCategory->id) }}""> {{ $subCategory->name}} </a></label></li>
							@endforeach
						</ul>
						
					</li>
					@endforeach
				</ul>
				
			</div>
		
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Product <span>Compare(0)</span></h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<form action="{{ url('getList')}}#filter" method="post">
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option> 					
						<option value="sort_desc">Price(High - Low)</option>
						<option value="sort_esc">Price(Low - High)</option>		
					</select>
					</form>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top">
				
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<style type="text/css">
							.img-responsive2 {
								width: 600px;
								height: 100px;
							}
						</style>
						<li>
							<img class="img-responsive2" src="{{ asset ('images/banner5.jpg') }}" alt=" "/>
						</li>
						
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="{{ asset ('images/banner5.jpg') }}" alt=" " />
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4>Exclusive Men's <span>Collections</span></h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			
				
		</div>
		<div class="clearfix"></div>
		<style type="text/css">
			.no-product {
				font-size: 40px;
				color: red;

			}
		
		</style>
		
		<div class="single-pro">
			@if($products->count() == 0)
				<?php  echo "<span class="."no-product"."> KHÔNG CÓ SẢN PHẨM NÀO </span>" ?>
			@else 
				<?php  echo "<span class="."product"."> Tổng sản phẩm có: ". $products->count() ." </span>" ?>
			@endif
	 @foreach ($products as $product)
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
										<h4><a href="single">{{ $product->name }}</a></h4>
										<div class="info-product-price">
											<span class="item_price">{{ $product->price }} VNĐ</span>
											<del>69.71 VNĐ</del>
										</div>
										<div >
											
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
			</div>

			
	@endforeach
						
							<div class="clearfix"></div>
		</div>	
		</div>
	
</div>

{{ $products->links() }}

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



