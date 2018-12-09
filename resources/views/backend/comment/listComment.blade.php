@extends('backend.masterpage.masterpage')
@section('title')
      Comment
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
			<h1>Manage Comment</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title">   </span>
							<h5>Comment</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>User</th>
																	
										<th>Message</th>
										<th>Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($comment as $cmt)
										<tr product-id="{{ $cmt->id }}">
											<td>{{ $cmt->id }}</td>
											
											<td>
												<?php 

												$username = DB::table('users')->where('id', $cmt->idUser)->first();
												?>
											{{ $username->name }}
											</td>
											
											<td> 
												{{ $cmt->message }}
											</td>
											<th>
												{{ $cmt->created_at }}
											</th>
											
										<td>

											<a onclick=" return XacNhanXoa('Bạn có chắc muốn xóa không'); " href="{{ URL::route('admin/comment/getDelete', $cmt->id) }}"><div class="btn btn-danger btn-mini">Delete</div></a>
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
