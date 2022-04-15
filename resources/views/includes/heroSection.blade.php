<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Category</span>
                        </div>
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
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>

                    </div>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    
                        
					
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
							<?php
								$ac="";
								$active="SELECT `shlideID` FROM `tble_slider` WHERE `status`=1  ORDER BY `shlideID` ASC LIMIT 1;";
								$runactive = mysqli_query($conn,$active);
								$getac = mysqli_fetch_array($runactive);
								
								$getslideshow = 'SELECT tble_slider.shlideID as "shlideID", tbl_image.imgname as "imgname", tble_slider.slidename as "slidename", tble_slider.text as "text", tble_slider.description as "description", tble_slider.status as "status"
								FROM `tble_slider` 
								INNER JOIN tbl_image on tble_slider.imageID=tbl_image.imgID
								WHERE `status`=1;';
								$rungetslideshow = mysqli_query($conn,$getslideshow);
								$num = mysqli_num_rows($rungetslideshow);
								if($num==0)
								{
							?>
							<div class="carousel-item active">
								<img src="img/images/default.png" style="width:100%;height: 420px">
								<div class="carousel-caption">
									<div class="text-dark">
											<span>No Image</span>
											<h2>No Slider</h2>
										<p>Slide show is not founds</p>
									 </div>
								</div>
                            </div>
							<?php
								}
								while($getsliderows = mysqli_fetch_array($rungetslideshow))
								{

										if($getac['shlideID'] == $getsliderows['shlideID'])
										{
											$ac="active";
										}
										else
										{
											$ac="";
										}
									
							?>
							<!-- Indicators -->
                        <ol class="carousel-indicators">
							<?php
								for($j=0;$j<$num;$j++)
								{
							?>
                        	<li data-target="#myCarousel" data-slide-to="<?=$j?>" class="<?=$ac?>"></li>
							<?php
								}
							?>
                        </ol>
                            <div class="carousel-item <?=$ac?>">
								<img src="img/images/<?=$getsliderows["imgname"]?>" style="width:100%;height: 420px" alt="<?=$getsliderows['slidename']?>">
                                <div class="carousel-caption">
                                    <div class="text-white">
                                        <span><?=$getsliderows['slidename']?></span>
                                        <h2><?=$getsliderows['text']?></h2>
                                        <a href="/shop" class="btn btn-success">SHOP NOW</a>
                                        <p><?=$getsliderows['description']?></p>
                                    </div>
                                </div>
                            </div>
							<?php
							}
							?>
                        </div>
                    

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>