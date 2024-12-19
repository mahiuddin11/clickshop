<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Laravel\Prompts\Prompt;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{

// public function __construct()
// {
//     dd('sdf');

// }
    //
    public function index()
    {

        $products = Product::orderBy('created_at', 'DESC')->paginate(10);

        
        return view('Admin.products.product_list', compact('products'));
    }

    public function productCreate()
    {

        $catagories = Catagory::get();
        $brands = Brand::get();

        return view('Admin.products.product_add', compact('catagories', 'brands'));
    }

    public function store(Request $request)
    {

        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_description = $request->short_description ?? "";
        $product->description  = $request->description ?? "" ;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;

        $current_timestamp = Carbon::now()->timestamp;

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image') ?? "";
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenereateProductThubmailImage($image, $imageName);
            $product->image = $imageName;
        }


        // Gallery image handling
        $gallery_array = [];
        $gallery_images = '';
        $counter = 1;

        if ($request->hasFile('images')) {
            $allowedfile = ['jpg', 'png', 'jpeg'];
            $files = $request->file('images');

            foreach ($files as $file) {
                $getextension = $file->getClientOriginalExtension();
                $gcheck = in_array($getextension, $allowedfile);

                if ($gcheck) {
                    $gfileName = $current_timestamp . '_' . $counter . '.' . $getextension;

                    // Pass the actual file, not just the name
                    $this->GenereateProductThubmailImage($file, $gfileName);

                    array_push($gallery_array, $gfileName);
                    $counter++;
                }
            }

            $gallery_images = implode(',', $gallery_array);
        }

        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('admin.productlist')->with('status', 'Product has been added sucessfull');
    }


    public function GenereateProductThubmailImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/products/thumbmails');
        $imagefolderPath = public_path('uploads/products');

        // Load the image using Intervention Image
        $img = Image::make($image->path());

        // Create a resized version for product display
        $img->fit(540, 689, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . '/' . $imageName);

        // Create a thumbnail version
        $img->fit(104, 104, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . '/' . $imageName);
    }

    public function edit($id){

        $product = Product::find($id);
        $catagories = Catagory::get();
        $brands = Brand::get();
        // dd($catagories);
        return view('Admin.products.product_edit', compact('catagories', 'brands' , 'product'));
    }

    public function update(Request $request , $id ){

       $product = Product::find($id);
        
       $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_description = $request->short_description ?? "";
        $product->description  = $request->description ?? "" ;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;

        $current_timestamp = Carbon::now()->timestamp;
          // Handle main image
          if ($request->hasFile('image')) {
            $image = $request->file('image') ?? "";
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenereateProductThubmailImage($image, $imageName);
            $product->image = $imageName;
        }


        // Gallery image handling
        $gallery_array = [];
        $gallery_images = '';
        $counter = 1;

        if ($request->hasFile('images')) {
            $allowedfile = ['jpg', 'png', 'jpeg'];
            $files = $request->file('images');

            foreach ($files as $file) {
                $getextension = $file->getClientOriginalExtension();
                $gcheck = in_array($getextension, $allowedfile);

                if ($gcheck) {
                    $gfileName = $current_timestamp . '_' . $counter . '.' . $getextension;

                    // Pass the actual file, not just the name
                    $this->GenereateProductThubmailImage($file, $gfileName);

                    array_push($gallery_array, $gfileName);
                    $counter++;
                }
            }

            $gallery_images = implode(',', $gallery_array);
        }

        $product->images = $gallery_images;
        $product->save();

      
        return redirect()->route('admin.productlist')->with('status', 'Product has been Update sucessfull');
    }
}
