<?php $page = '/shopDetail';?>
<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
@extends('layouts.default')
@section('content')
    <?php
		$imgid = $shipp['imgID'];
        $sql = "SELECT * FROM `tbl_image` WHERE `imgID`=$imgid";
		$runsql = mysqli_query($conn,$sql);
		$get = mysqli_fetch_array($runsql);
		
		$disid = $shipp['discountID'];
        $dissql = "SELECT * FROM `tbl_discount` WHERE `discountID`=$disid";
		$rundissql = mysqli_query($conn,$dissql);
		$disget = mysqli_fetch_array($rundissql);
			
		
    ?>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                        <img class="product__details__pic__item" src="{{URL::asset('img/images/'.$get['imgname'])}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$shipp['name']}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>({{$shipp['liker']}} Like)</span>
                        </div>
                        <div class="product__details__price">$<?=number_format($shipp['price'] - $disget['discountPerent'],2)?></div>
                        <p>Discount $<?=$disget['discountPerent']?></p>
                        <div class="product__details__quantity">
                            <div>
                                <div>
                                    <input type="number" class="form-control" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="{{route('shop.like',['id'=>$shipp['proID']])}}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>{{$shipp['qty']}}</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>-{{$shipp['desc']}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Reviews</h6>
                                    <textarea rows="10" name="review" class="form-control" placeholder="Reviews"></textarea>
									<div class="mt-3">
										<button type="submit" class="btn btn-primary w-25">Submit</button>
										<button type="reset" class="btn btn-dark w-25">Clear</button>
									</div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection