@extends('backend.masterpage.masterpage')
@section('content')
	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="{{ asset ('/admin') }}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Manage Products</h1>
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
										<input name="txtname" type="text" class="span11" placeholder="Name" 
										value="{{old('txtname', isset($data) ? $data->name : null)}}" /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Parent_Category</label>
									<div class="controls">
										<select name="parent_id"/>
										<option value="0">None</option>
										
										<!-- // xong -->
										@foreach ($parent as $category)
											@if ($category->id == $data->parent_id)
													<option value="{{ $category->id }}" selected>													
														{{ $category->name }}
													</option>
											@else
													<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endif
										@endforeach

										</select>
									</div>
								</div>
								

								<div class="control-group">
									<label class="control-label">Type</label>
									<div class="controls">
										<input name="txtType" type="text" class="span11" placeholder="Price"
										value="{{old('txtType', isset($data) ? $data->type : null)}}" /> *
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