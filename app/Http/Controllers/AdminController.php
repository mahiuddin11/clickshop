<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Illuminate\Image\Laravel\Facades\Image;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function index()
    {

        return view('Admin.index');
    }

    public function brand()
    {

        $brands = Brand::OrderBy('id', 'DESC')->paginate(10);
        return view('admin.brands', compact('brands'));
    }

    public function brandAdd()
    {

        return view('Admin.brand-add');
    }

    public function brand_stor(Request $request)
    {

        //  dd($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'unique:brands,slug',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $brand = new Brand();

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            // Image File Processing
            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;

            // Thumbnail Generation
            $this->generateThumbnailsImage($image, $file_name , $folderPath = 'uploads/brands');

            // Store image file name in the database
            $brand->image = $file_name;
        }

        $brand->save();

        return redirect()->route('admin.brands')->with('success', 'Brand Created successfully');
    }

    public function generateThumbnailsImage($image, $imageName , $folderPath)
    {
        $destinationPath = public_path($folderPath);
        $img = Image::make($image->getRealPath()); // getRealPath() ব্যবহার করা হয়েছে
        $img->fit(124, 124, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);
    }

    public function brand_edit($id)
    {

        $brand = Brand::find($id);
        return view('Admin.brand-edit', compact('brand'));
    }

    public function brand_update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,web|min:2048'
        ]);

        $brand = Brand::find($request->id);
        // dd($brand);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/brands') . '/' . $brand->image)) {
                File::delete(public_path('uploads/brands') . '/' . $brand->image);
            }

            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;

            // Thumbnail Generation
            $this->generateThumbnailsImage($image, $file_name , $folderPath = 'uploads/brands' );
            $brand->image = $file_name;
        }

        $brand->save();
        return redirect()->route('admin.brands')->with('success', 'Brand Update successfully');
    }



    public function brand_delete($id)
    {

        $brand = Brand::find($id);
        // dd($brand);
        if (File::exists(public_path('uploads/brands') . '/' . $brand->image)) {
            File::delete(public_path('uploads/brands') . '/' . $brand->image);
        }
        $brand->delete();


        $this->resetBrandIds();

        return redirect()->route('admin.brands')->with('success', 'Brand delete successfull');
    }

    protected function resetBrandIds()
    {
        // একটি ইনডেক্সার ব্যবহার করে সব ব্র্যান্ডের নতুন আইডি নির্ধারণ
        $brands = Brand::orderBy('id')->get();
        $newId = 1;

        foreach ($brands as $brand) {
            DB::table('brands')->where('id', $brand)->update(['id' => $newId]);
            $newId++;
        }

        // Auto Increment value রিসেট করুন
        DB::statement('ALTER TABLE brands AUTO_INCREMENT = ' . ($newId));
    }

    // catagory controll section
    // catagory controol
    // catagory controll section
    // catagory controol

    public function catagories(){
        $catagories = Catagory::orderBy('id')->paginate(10);
        return view('Admin.catagories.catagories', compact('catagories'));
    }

    public function catagoriesAdd(){

        return view('Admin.catagories.catagoriesAdd');
    }

    public function catagories_store(Request $request){

        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:catagories,slug',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $catagories = new Catagory();

        $catagories->name = $request->name;
        $catagories->slug = Str::slug($request->name);


        if($request->hasFile('image')){
            if(File::exists( public_path( 'uploads/Catagories') .'/'. $request->image)){
                File::delete(public_path('uploads/Catagories') . '/'. $request->image);
            }

            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp.'.'. $file_extension;
            $this->generateThumbnailsImage($image, $file_name , $folderPath = 'uploads/Catagories');
            $catagories->image = $file_name;
        }
        $catagories->save();

        return redirect()->route('admin.catagoris')->with('success','catagory create successfull');

    }

    public function catagorie_edit($id){

        $catagorie = Catagory::find($id);

        return view( 'Admin.catagories.catagories-edit', compact('catagorie'));
    }

    public function catagorie_update(Request $request ){

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,web|min:2048'
        ]);

        $catagories = Catagory::find($request->id);

        $catagories->name = $request->name;
        $catagories->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/catagories') . '/' . $catagories->image)) {
                File::delete(public_path('uploads/catagories') . '/' . $catagories->image);
            }

            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;

            // Thumbnail Generation
            $this->generateThumbnailsImage($image, $file_name , $folderPath = 'uploads/catagories' );
            $catagories->image = $file_name;
        }

        $catagories->save();
        return redirect()->route('admin.catagoris')->with('success', 'catagories Update successfully');
    }

    public function catagorie_delete($id){

        $catagories = Catagory::find($id);
        if (File::exists(public_path('uploads/catagories') . '/' . $catagories->image)) {
            File::delete(public_path('uploads/catagories') . '/' . $catagories->image);
        }


        $catagories->delete();


        return redirect()->route('admin.catagoris')->with('success','catagorie delete successfull');
    }


    public function company_setting(){

        return view('Admin.setting');
    }




}
