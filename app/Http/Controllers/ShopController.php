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
        $reletedProduct = Product::where('slug', '<>', $product_slug)
                        ->where('category_id', $product->category_id)
                         ->take(8)
                         ->get();
        return view('product_details', get_defined_vars());
    }


}
