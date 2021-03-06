<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class ShoppingCartController extends Controller
{
    public function shoppingcart()
    {
        Cart::add('192ao12', 'Product 1', 1, 9.99);
        Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
        return view('shoppingcart');
    }
}
