<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //

    public function index(){
        $items = Cart::instance('cart')->content();
        return view('website.cart', get_defined_vars());
    }
    // public function index2(){

    //     return view('website.cart');
    // }
   
}
