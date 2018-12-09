@extends('backend.masterpage.masterpage')
@section('title')
      Edit
@endsection
@section('content')
<style type="text/css">
	.img_current {
		width: 100px;
		height: 100px;
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
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Product-info</h5>
						</div>
						<div class="widget-content nopadding">
							<!-- kiểm tra dữ liệu khi sửa sản phẩm -->
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

							<!-- BEGIN USER FORM -->
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<div class="control-group">
									<label class="control-label">Name :</label>
									<div class="controls">
									<input type="hidden" name="img_current" value="{{ $product->image }}">

										<input name="name" type="text" class="span11" placeholder="Name" 
										value="{{ old('name', isset($product) ? $product->name : null) }}" 
										 /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Category:</label>
									<div class="controls">
										<select name="category"/>
										@foreach ($cate as $category)
											@if ($category->id == $product->category_id)
											<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
											@else
											<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endif
										@endforeach
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Price :</label>
									<div class="controls">
										<input name="price" type="text" class="span11" placeholder="Price" 
										value="{{ old('price', isset($product) ? $product->price : null) }}" 
										 /> *
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Description: </label>
									<div class="controls">
										<textarea name="description" class="span11"
										>{{ old('description', isset($product) ? $product->description : null) }}</textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Current Image: </label>
									<div class="controls">
										<img src="{{ asset('images/'.$product->image)}}" class="img_current" id = "img_current"
										>
									</div>
									
								</div>
								
								<div class="control-group">
									<label class="control-label">Picture : </label>
									<div class="controls">
										<input type="file" name="fileToUpLoad"	 
										onchange = "document.getElementById('img_current').src = window.URL.createOjectURL(this.files[0])">
										
									</div>


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