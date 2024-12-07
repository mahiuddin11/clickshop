<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';



    protected $fillable = [
        'name',
        'slug',
        'catagory_id',
        'brand_id',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'quantity',
        'stock_status',
        'featured',
        'image',
        'images',
    ];


    public function Catagory(){

        return $this->belongsTo(Catagory::class, 'catagory_id');
    }

    public function Brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
