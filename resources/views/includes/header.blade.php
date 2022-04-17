<?php
	$servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);

	$sql = "SELECT * FROM `tbl_info` WHERE `instatus` =1 limit 1 ";
	$runsql = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($runsql);
?>
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
								<?php 
								if(is_null($row))
									{
									echo "";
									}
									else
									{
								?>
                                <li class="text-primary"><i class="fa fa-envelope"></i> <?=$row['email']?></li>
                                <li class="text-warning"><?=$row['infortext']?></li>
								<?php
								}
								?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="d-flex justify-content-end p-2">

                            <div >

                                @if(!(Auth::check()))
                                <span><a href="/login"><i class="fa fa-user"></i> Login</a></span>
                                @else
                                <i class="fa fa-user"></i>
                                <span class="mr-5">
                                    {{Auth::user()->name}}
                                </span>
                                <span class="sidebar-link sidebar-link" aria-expanded="false" onClick="document.getElementById('logout').submit();" style="cursor: pointer">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="hide-menu">Logout</span>
                                    <form action="{{ route('logout') }}" method="post" id="logout">
                                    {{ csrf_field() }}
                                    </form>
                                </span>
                                @endif
                            </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <img src="{{ URL::asset('admin/assets/images/logo-icon.png')}}" alt="" style="width: 80px">
                        <span><h3><strong class="text-primary">E</strong><strong class="text-success">-One</strong><strong class="text-danger">Shop</strong></h3></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?php $page; if($page=='/'){echo('active');}?>"><a href="/">Home</a></li>
                            <li class="<?php $page; if($page=='/shop'){echo('active');}?>"><a href="/shop">Shop</a></li>
                            <li class="<?php $page; if($page=='/shopDetail' or $page=='/ShoppingCart' or $page=='/checkout' or $page=='/blogeDetail'){echo('active');}?>"><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    
                                    <li><a href="/ShoppingCart">Shoping Cart</a></li>
                                    <li><a href="/checkout">Check Out</a></li>
                                    <li><a href="/blogeDetail">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="<?php $page; if($page=='/bloge'){echo('active');}?>"><a href="/bloge">Blog</a></li>
                            <li class="<?php $page; if($page=='/contact'){echo('active');}?>"><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>