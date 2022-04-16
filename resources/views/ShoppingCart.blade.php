<?php $page = '/ShoppingCart';?>
@extends('layouts.default')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>Image</th>
                                    <th>Products</th>
                                    <th width="200px">Qty</th>
                                    <th width="200px">Price</th>
                                    <th width="200px">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(Cart::content() as $row) :?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                    </td>
                                    <td>
                                        <p><strong><?php echo $row->name; ?></strong></p>
                                        <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                                    </td>
                                    <td><input type="text" class="form-control" value="<?php echo $row->qty; ?>" disabled></td>
                                    <td class="text-center">$<?php echo $row->price; ?></td>
                                    <td class="text-center">$<?php echo $row->total; ?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?php echo Cart::subtotal(); ?></span></li>
                            <li>Tax <span>$<?php echo Cart::tax(); ?></span></li>
                            <li>Total <span>$<?php echo Cart::total(); ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection