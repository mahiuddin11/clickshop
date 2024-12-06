<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function index(){

        $products = Product::orderBy('created_at','DESC')->paginate(10);

        return view('Admin.products.product_list', compact('products'));
    }

    public function productCreate(){

        $catagories = Catagory::get();
        $brands = Brand::get();

        return view('Admin.products.product_add', compact('catagories', 'brands'));
    }

    public function store(Request $request){

        dd($request->all());

        // Validate input
        // $validated = $request->validate([
        //     'name' => 'required|string|max:100',
        //     'slug' => 'required|string|max:100|unique:products,slug',
        //     'category_id' => 'required|exists:categories,id',
        //     'brand_id' => 'required|exists:brands,id',
        //     'short_description' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'regular_price' => 'required|numeric',
        //     'sale_price' => 'required|numeric',
        //     'SKU' => 'required|string|max:50|unique:products,SKU',
        //     'quantity' => 'required|integer|min:0',
        //     'stock_status' => 'required|in:instock,outofstock',
        //     'featured' => 'required|boolean',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->Catagory_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
        }

        $product->save();






    }

}
