<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $product = Product::orderBy('created_at','desc');
        return view('website.shop',get_defined_vars());
    }
}
