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
						<div class="widget-title"> <span class="icon"> <a href="{{ asset('/admin/cate/add') }}"><i class="icon-th"></i></a>  </span>
							<h5>New Bill</h5>
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
									@foreach($detail as $detail)
										<tr product-id="{{ $detail->id }}">
											<td>{{ $detail->id }}</td>
											<td>

												
												
												
											</td>
											<td> 
												
											</td>
											<td> 
												
											</td>
											<td> 
												
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
