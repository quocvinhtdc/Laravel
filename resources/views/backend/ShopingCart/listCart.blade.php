@extends('backend.masterpage.masterpage')
@section('title')
      Bill
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
			<h1>Manage Bill</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title">   </span>
							<h5> Bill</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Customer</th>										
										<th>Date</th>
										<th>Note</th>
										
										<th>Total</th>
										
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($bill as $bill)
										<tr product-id="{{ $bill->id }}">
											<td>{{ $bill->id }}</td>
											<td>

												<?php 
													$username = DB::table('users')->find($bill->customer_id);
													if(isset($username->name))
													{
														echo $username->name;
													}
													else
													{
														$username = DB::table('customers')->find($bill->customer_id);
														echo $username->name;
													}
													

												?>
												
												
												
											</td>
											<td> 
												{{ $bill->date_order }}
											</td>
											<td> 
												{{ $bill->note }}
											</td>
											<td> 
												{{ $bill->total }} VNĐ
											</td>
											
										<td>
										
											<a onclick=" return XacNhanXoa('Xác nhận bill đã thanh toán'); " href="{{ URL::route('admin/shoping-cart/getDelete', $bill->id) }}"><div class="btn btn-danger btn-mini">Checked</div></a>
										</td>
									</tr>
									@endforeach

									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	
		</div>

									
	</div>
	


	<!-- END CONTENT -->

@endsection
