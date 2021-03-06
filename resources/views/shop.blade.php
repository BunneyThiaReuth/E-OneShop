<?php $page = '/shop';?>
@extends('layouts.default')
@section('content')
<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Category</h4>
                            <ul>
                            <?php
                                $getcate ="SELECT * FROM `tbl_category` WHERE `status` =1 order by cateID DESC limit 14";
                                $rungetcate=mysqli_query($conn,$getcate);
                                $numcate = mysqli_num_rows($rungetcate);
                                if($numcate == 0)
                                {
                                    echo "<li><p>Category not found</p></li>";
                                }
                                while($caterows=mysqli_fetch_array($rungetcate))
                                {
                            ?>
                                <li><a href="/shop"><?=$caterows['name']?></a></li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
            
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest 10 Products</h4>
                                <div class="latest-product__slider owl-carousel">
									
                                    <div class="latest-prdouct__slider__item">
										<?php
											$lastPor='SELECT tbl_products.proID as "proID", tbl_image.imgname as "imgname", tbl_products.name as "name", tbl_category.name as "cname", tbl_products.qty as "qty", tbl_products.price as "price", tbl_discount.discountPerent as "discountPerent", tbl_products.desc as "desc",tbl_products.price - tbl_discount.discountPerent as "saleOff" FROM `tbl_products` INNER JOIN tbl_discount on tbl_products.discountID = tbl_discount.discountID INNER JOIN tbl_image on tbl_products.imgID = tbl_image.imgID INNER JOIN tbl_category on tbl_products.cateID = tbl_category.cateID ORDER BY `proID` DESC LIMIT 10;';
											$runlastPor = mysqli_query($conn,$lastPor);
											while($getrowlastPor = mysqli_fetch_array($runlastPor))
											{
										?>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/images/thumbnail/<?=$getrowlastPor["imgname"]?>" alt="<?=$getrowlastPor["imgname"]?>" style="width: 50px;height: 50px" >
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$getrowlastPor['name']?></h6>
                                                <span>$<?= number_format($getrowlastPor['saleOff'],2) ?></span>
                                            </div>
                                        </a>
										<?php
											}
										?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Last Top 3 Reaction</h4>
                                <div class="latest-product__slider owl-carousel">
									
                                    <div class="latest-prdouct__slider__item">
										<?php
											$like='SELECT tbl_products.proID as "proID",tbl_products.liker as "liker", tbl_image.imgname as "imgname", tbl_products.name as "name", tbl_category.name as "cname", tbl_products.qty as "qty", tbl_products.price as "price", tbl_discount.discountPerent as "discountPerent", tbl_products.desc as "desc",tbl_products.price - tbl_discount.discountPerent as "saleOff" FROM `tbl_products` INNER JOIN tbl_discount on tbl_products.discountID = tbl_discount.discountID INNER JOIN tbl_image on tbl_products.imgID = tbl_image.imgID INNER JOIN tbl_category on tbl_products.cateID = tbl_category.cateID WHERE `liker`>=50 ORDER BY `proID` DESC LIMIT 3;';
											$runlike = mysqli_query($conn,$like);
											while($rowLike = mysqli_fetch_array($runlike))
											{
										?>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/images/thumbnail/<?=$rowLike["imgname"]?>" alt="<?=$rowLike["imgname"]?>" style="width: 50px;height: 50px" >
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$rowLike['name']?></h6>
                                                <span>$<?= number_format($rowLike['saleOff'],2) ?></span>
                                                <p><?= "Like :". $rowLike['liker'] ?></p>
                                            </div>
                                        </a>
										<?php
											}
										?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
							<div class="filter__found">
								<?php
                                    $countallpro = "SELECT COUNT(`proID`) as 'allnum' FROM `tbl_products`";
                                    $runcountallpro= mysqli_query($conn,$countallpro);
                                    $allnum = mysqli_fetch_array($runcountallpro);

									$disnumpro = "SELECT COUNT(`proID`) as 'dinum' FROM `tbl_products`
									INNER JOIN tbl_discount on tbl_products.discountID = tbl_discount.discountID
									WHERE tbl_discount.discountPerent>0;";
									$rundisnumpro= mysqli_query($conn,$disnumpro);
									$discountrow = mysqli_fetch_array($rundisnumpro);
								?>
                                    <h6>All Discounts <span><?="(".$discountrow['dinum'].")"?></span></h6>
                              </div>
                        </div>

                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
							<?php
								$prodis='SELECT tbl_products.proID as "proID", tbl_image.imgname as "imgname", tbl_products.name as "name", tbl_category.name as "cname", tbl_products.qty as "qty", tbl_products.price as "price", tbl_discount.discountPerent as "discountPerent", tbl_products.desc as "desc",tbl_products.price - tbl_discount.discountPerent as "saleOff" FROM `tbl_products` INNER JOIN tbl_discount on tbl_products.discountID = tbl_discount.discountID INNER JOIN tbl_image on tbl_products.imgID = tbl_image.imgID INNER JOIN tbl_category on tbl_products.cateID = tbl_category.cateID WHERE tbl_discount.discountPerent>0;';
								$runprodis = mysqli_query($conn,$prodis);
								$numprodis = mysqli_num_rows($runprodis);
								if($numprodis>0)
								{
									while($getrowprodis = mysqli_fetch_array($runprodis))
									{
							?>
									<div class="col-lg-4">
										<div class="product__discount__item">
											<div class="product__discount__item__pic set-bg "
												data-setbg="img/images/<?=$getrowprodis["imgname"]?>">
												<div class="product__discount__percent">$<?=$getrowprodis['discountPerent']?></div>
												<ul class="product__item__pic__hover">
													<li><a href="{{route('shop.like',['id'=>$getrowprodis['proID']])}}"><i class="fa fa-heart"></i></a></li>
													
													<li><a href="{{route('shop.shipping',['id'=>$getrowprodis['proID']])}}"><i class="fa fa-shopping-cart"></i></a></li>
												</ul>
											</div>
											<div class="product__discount__item__text">
												<span><?=$getrowprodis['cname']?></span>
												<h5><a href="#"><?=$getrowprodis['name']?></a></h5>
												<div class="product__item__price">$<?=number_format($getrowprodis['saleOff'],2)?> <span>$<?=$getrowprodis['price']?></span></div>
											</div>
										</div>
									</div>
								<?php
									}
								}
								else{
									echo("<h4>Prodcuts Discount Is Not Found !</h4>");
								}
								?>
								
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>All Products <span>({{$allnum['allnum']}})</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach($pro as $pros)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/images/{{$pros['imgname']}}">
                                    <ul class="product__item__pic__hover">
                                   
										<input type="hidden" value="1" name="txt_addlike">
										
                                        <li>
											<a href="{{route('shop.like',['id'=>$pros['proID']])}}">
												<i class="fa fa-heart"></i>
											</a>
										</li>
                                        
                                        <li><a href="{{route('shop.shipping',['id'=>$pros['proID']])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?=$pros['name']?></a></h6>
                                    <h5>$<?=number_format($pros['price']-$pros['disc'],2)?></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div>
                    {{$pro->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection