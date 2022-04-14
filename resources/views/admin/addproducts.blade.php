@extends('admin.layouts.adminpage')
@section('content')
<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Add Products</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/addproducts">Add Products</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
				@if($message = Session::get('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> {{$message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		@elseif($message = Session::get('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Success!</strong> {{$message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		@endif
                {{ Form::open(array('action' => 'addProductsController@store','enctype'=>'multipart/form-data')) }}
                	<div class="row mt-3">
						<div class="col">
							<label class="form-label">Select Image:</label>
							<select class="form-control" name="txt_image" required>
								<option value="">--Select--</option>
                                <?php
                                    
                                    $getimage = "SELECT * FROM `tbl_image`";
                                    $rungetimage = mysqli_query($conn,$getimage);
									while($imgrows = mysqli_fetch_array($rungetimage))
									{
                                ?>
                                <option value="<?=$imgrows['imgID']?>">
									#<?=$imgrows['imgID']."_".$imgrows['desc']?>
								</option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col">
							<label class="form-label">Select Category:</label>
							<select class="form-control" name="txt_category" required>
								<option value="">--Select--</option>

                                <?php
                                    
                                    $getcate = "SELECT * FROM `tbl_category` WHERE `status`=1";
                                    $rungetcate = mysqli_query($conn,$getcate);
									while($caterows = mysqli_fetch_array($rungetcate))
									{
                                ?>
                                <option value="<?=$caterows['cateID']?>">
									#<?=$caterows['cateID']."_".$caterows['name']?>
								</option>
								<?php
									}
								?>

							</select>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<label class="form-label">Name:</label>
							<input type="text" class="form-control" name="txt_pname" placeholder="Enter product name" required>
						</div>
						<div class="col">
							<label class="form-label">Quantity:</label>
							<input type="number" class="form-control" name="txt_qty" placeholder="Enter quantity" required>
						</div>
						<div class="col">
							<label class="form-label">Price:</label>
							<input type="text" class="form-control" name="txt_price" placeholder="Enter price" required>
						</div>
						<div class="col">
							<label class="form-label">Select discount:</label>
							<select class="form-control" name="txt_discount" required>
								<option value="">--Select--</option>
								<?php
                                    
                                    $getdis = "SELECT * FROM `tbl_discount` WHERE `status`=1";
                                    $rungetdis = mysqli_query($conn,$getdis);
									while($disrows = mysqli_fetch_array($rungetdis))
									{
                                ?>
                                <option value="<?=$disrows['discountID']?>">
									#<?=$disrows['discountID']."_$".$disrows['discountPerent']?>
								</option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<label class="form-label">Description:</label>
							<textarea class="form-control" rows="10" name="txt_desc" placeholder="Description"></textarea>
						</div>
					</div>
					<div class="mt-3">
						<button type="submit" class="btn btn-primary w-25">Save</button>
						<button type="reset" class="btn btn-dark w-25">Clear</button>
					</div>
                {{ Form::close() }}
            </div>
@endsection