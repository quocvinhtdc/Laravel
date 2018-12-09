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

							<form action="{{ url('/admin/product/add') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}

								<?php
									use App\Category;
									$categories = Category::all();
								?>
								
								<div class="control-group">
									<label class="control-label">Name :</label>
									<div class="controls">
										<input name="name" type="text" class="span11" placeholder="Name"
										value="{{ old('name') }}" /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Category:</label>
									<div class="controls">
										<select name="category"/>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
											<ad>
										@endforeach
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Price :</label>
									<div class="controls">
										<input name="price" type="text" class="span11" placeholder="Price" value="{{ old('price') }}" /> *
									</div>
								</div>
								

								<div class="control-group">
									<label class="control-label">Description: </label>
									<div class="controls">
										<textarea name="description" class="span11" > {{ old('description') }} </textarea>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Picture : </label>
									<div class="controls">
										<input type="file" name="fileToUpLoad" id="fileToUpLoad" class="btn btn-success" 
										value="{{ old('fileToUpLoad') }}"/>
									</div>
								</div>

								<div class="form-actions">
										<button type="submit" class="btn btn-success">Save</button>
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