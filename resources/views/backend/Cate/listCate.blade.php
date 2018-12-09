@extends('backend.masterpage.masterpage')
@section('title')
      Category
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
			<h1>Manage Category</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <a href="{{ asset('/admin/cate/add') }}"><i class="icon-th"></i></a>  </span>
							<h5>New Categoty</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>										
										<th>Parent_id</th>
										<th>Type</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($Cate as $cate)
										<tr product-id="{{ $cate->id }}">
											<td>{{ $cate->id }}</td>
											<td>
												{{ $cate->name }}
											</td>
											<td> 
												@if($cate->parent_id == 0)
													{{ "None" }}
												@else
												<?php 
													$parent = DB::table('categories')->find($cate->parent_id);
													echo $parent->name;
												 ?>
												 @endif
											</td>
											<th>
												{{ $cate->type }}
											</th>
											
										<td>
											<a href="{{ URL::route('admin/cate/getEdit', $cate->id) }}"><div class=" btn btn-success btn-mini">Edit</div></a>

											<a onclick=" return XacNhanXoa('Bạn có chắc muốn xóa không'); " href="{{ URL::route('admin/cate/getDelete', $cate->id) }}"><div class="btn btn-danger btn-mini">Delete</div></a>
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
