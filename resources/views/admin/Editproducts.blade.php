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
				{{ Form::open(array('action' => array('addProductsController@update',$listpro['proID']),'method'=>'put','enctype'=>'multipart/form-data')) }}
                	<div class="row mt-3">
						<div class="col">
							<label class="form-label">Select Image:</label>
							<select class="form-control" name="txt_image" required>
								<option value="">--Select--</option>
								<option value="{{$listpro['imgID']}}" selected>
									<?php
										$imgid= $listpro['imgID'];
										$getimgname = "SELECT * FROM `tbl_image` WHERE `imgID` = $imgid";
										$runggetimgname = mysqli_query($conn,$getimgname);
										$imgnamerows = mysqli_fetch_array($runggetimgname);
										echo "#".$imgnamerows['imgID']."_".$imgnamerows['desc'];
									?>
								</option>
                                <?php
                                    $select="";
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
								<option value="{{$listpro['cateID']}}" selected>
									<?php
										$cateid= $listpro['cateID'];
										$getcatename = "SELECT * FROM `tbl_category` WHERE `cateID` = $cateid";
										$rungetcatename = mysqli_query($conn,$getcatename);
										$icatenamerows = mysqli_fetch_array($rungetcatename);
										echo "#".$icatenamerows['cateID']."_".$icatenamerows['name'];
									?>
								</option>

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
							<input type="text" value="{{$listpro['name']}}" class="form-control" name="txt_pname" placeholder="Enter product name" required>
						</div>
						<div class="col">
							<label class="form-label">Quantity:</label>
							<input type="number" value="{{$listpro['qty']}}" class="form-control" name="txt_qty" placeholder="Enter quantity" required>
						</div>
						<div class="col">
							<label class="form-label">Price:</label>
							<input type="text" value="{{$listpro['price']}}" class="form-control" name="txt_price" placeholder="Enter price" required>
						</div>
						<div class="col">
							<label class="form-label">Select discount:</label>
							<select class="form-control" name="txt_discount" required>
								<option value="">--Select--</option>
								<option value="{{$listpro['discountID']}}" selected>
									<?php
										$disid= $listpro['discountID'];
										$getdis = "SELECT * FROM `tbl_discount` WHERE `discountID` = $disid";
										$rungetdis = mysqli_query($conn,$getdis);
										$disrows = mysqli_fetch_array($rungetdis);
										echo "#".$disrows['discountID']."_".$disrows['discountPerent'];
									?>
								</option>
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
							<textarea class="form-control" rows="10" name="txt_desc" placeholder="Description">{{$listpro['desc']}}</textarea>
						</div>
					</div>
					<div class="mt-3">
						<button type="submit" class="btn btn-primary w-25">Update</button>
						<a href="/listproducts" class="btn btn-dark w-25">Back</a>
					</div>
                {{ Form::close() }}
            </div>
@endsection