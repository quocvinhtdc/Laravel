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

							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<?php
									use App\Kind;
									use App\Category;
									$categories = Category::all();
								?>
								<div class="control-group">
									<label class="control-label">Name :</label>
									<div class="controls">
										<input name="name" type="text" class="span11" placeholder="Name"  /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Category:</label>
									<div class="controls">
										<select name="category"/>
										
											<option value="">ádasd</option>
										
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Price :</label>
									<div class="controls">
										<input name="price" type="text" class="span11" placeholder="Price" value="" /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Kind ID :</label>
									<div class="controls">
										<input name="kind" class="span11" placeholder="Kind id" value="" type="number" min="1" max="{{ Kind::all()->count() }}" step="1"/> *
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Description: </label>
									<div class="controls">
										<textarea name="description" class="span11" ></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Specification</label>
									<div class="controls">
										<textarea name="specification" class="span11"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Picture : </label>
									<div class="controls">
										<button type="file" name="fileToUpload" id="fileToUpload" class="btn btn-success">Choose Picture</button>
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