@extends('backend.masterpage.masterpage')
@section('title')
      Products
@endsection
@section('content')
<style type="text/css">
	.pagination li{
		list-style: none;
		float: left;
		margin: 5px;
	}
</style>
	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="{{ asset ('/admin/product') }}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Manage Products</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <a href="{{ asset('/admin/product/add') }}"><i class="icon-th"></i></a> </span>
							<h5>New Products</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>										
										<th>Image</th>
										<th>Date</th>		
										<th>Name</th>										
										<th>Category</th>
										<th>Price</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
										<tr product-id="{{ $product->id }}">
											<td>{{ $product->id }}</td>
											<style type="text/css">
												.iresponsive {
													width: 70px;
													height: 50px;
												}
											</style>
											<td>
												<img class="iresponsive" src="{{ asset ('images/'.$product->image) }}" alt=" "/>
											</td>
											<td>
												<?php
													echo \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans()
												 ?>
											</td>
											
											<td>{{ $product->name }}</td>
											<th>											
												
												<?php  $parent = DB::table('categories')->where('id', $product->category_id)->first();?>	

													@if(!empty($parent->name))
														{{ $parent->name }}
													@endif
												
											</th>
											<th>{{ $product->price }}</th>
										<td>
											<a href="{{ URL::route('admin/product/getEdit', $product->id) }}"><div class=" btn btn-success btn-mini">Edit</div></a>

											<a onclick=" return XacNhanXoa('Bạn có chắc muốn xóa không'); " href="{{ URL::route('admin/product/getDelete', $product->id) }}"><div class="btn btn-danger btn-mini">Delete</div></a>
										</td>
									</tr>
									@endforeach

									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			{{ $products->links() }}
		</div>

									
	</div>
	


	<!-- END CONTENT -->

@endsection
