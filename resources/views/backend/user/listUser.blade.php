@extends('backend.masterpage.masterpage')
@section('title')
      User
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
			<h1>Manage User</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <a href="{{ asset('/admin/user/add') }}"><i class="icon-th"></i></a>  </span>
							<h5>New User</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>										
										<th>Email</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user as $users)
										<tr product-id="{{ $users->id }}">
											<td>{{ $users->id }}</td>
											<td>
												{{ $users->name }}
											</td>
											<td> 
												{{ $users->email }}
											</td>
											<th>
												{{ $users->phone }}
											</th>
											<th>
												{{ $users->role }}
											</th>
											
										<td>
											<a href="{{ URL::route('admin/user/getEdit', $users->id) }}"><div class=" btn btn-success btn-mini">Edit</div></a>

											<a onclick=" return XacNhanXoa('Bạn có chắc muốn xóa không'); " href="{{ URL::route('admin/user/getDelete', $users->id) }}"><div class="btn btn-danger btn-mini">Delete</div></a>
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
