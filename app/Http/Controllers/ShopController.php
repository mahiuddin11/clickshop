<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

         $products = Product::orderBy('created_at', 'desc')->paginate(10);
        //  dd($products);
        return view('website.shop',compact('products'));
    }

    public function product_details($product_slug){

        $product = Product:: where('slug', $product_slug)->first();

        return view('product_details', compact('product'));
    }


}
