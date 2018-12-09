@extends('backend.masterpage.masterpage')
@section('content')
	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="{{ asset ('/admin') }}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Manage User</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Product-info</h5>
						</div>
						<div class="widget-content nopadding">
							 <!-- báo lỗi -->
							 <style type="text/css">
							 	.alert {
							 		color:red;
							 		font-size: 15px;
							 	}
							 </style>
							@if( count($errors) > 0)
								<div class="alert">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								
								<div class="control-group">
									<label class="control-label">Name :</label>
									<div class="controls">
										<input name="txtuser" type="text" class="span11" placeholder="Name" 
										value="{{old('txtuser', isset($data) ? $data->name : null)}}" /> *
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls">
										<input name="txtEmail" type="text" class="span11" placeholder="Email" 
										value="{{old('txtEmail', isset($data) ? $data->email : null)}}" /> *
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">PassWord :</label>
									<div class="controls">
										<input name="txtPassWord" type="password" class="span11" placeholder="PassWord" 
										/> *
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Re-PassWord :</label>
									<div class="controls">
										<input name="RePassWord" type="password" class="span11" placeholder="Re-PassWord" 
										/> *
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">phone :</label>
									<div class="controls">
										<input name="phone" type="text" class="span11" placeholder="phone" 
										value="{{old('phone', isset($data) ? $data->phone : null)}}" /> *
									</div>
								</div>


								<div class="control-group">
									<label class="control-label">Role: </label>
									<div class="controls">
										<select name="role"/>
											<option value="admin" 
												@if($data->role == "admin")				
												selected
												@endif
												
												> Admin
											</option>

											<option value="user" 
												@if($data->role == "user")				
												selected
												@endif
												
												> Guest
											</option>
										

										</select>
									</div>
								</div>
								
								<div class="control-group">
								
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Save</button>
									</div>
								</div>
							</form>
							<!-- END USER FORM -->


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- END CONTENT -->
@endsection