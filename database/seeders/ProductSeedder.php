<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Dummy product data
        $products = [
            [
                'name' => 'Product 1',
                'slug' => Str::slug('Product 1'),
                'category_id' => 1, // Assuming category with ID 1 exists
                'brand_id' => 1, // Assuming brand with ID 1 exists
                'short_description' => 'Short description for product 1.',
                'description' => 'Detailed description for product 1.',
                'regular_price' => 100.00,
                'sale_price' => 90.00,
                'SKU' => 'PDT001',
                'quantity' => 50,
                'stock_status' => 'instock',
                'featured' => 1,
                'image' => 'default.jpg',
                'images' => 'gallery1.jpg,gallery2.jpg',
            ],
            [
                'name' => 'Product 2',
                'slug' => Str::slug('Product 2'),
                'category_id' => 2,
                'brand_id' => 1,
                'short_description' => 'Short description for product 2.',
                'description' => 'Detailed description for product 2.',
                'regular_price' => 200.00,
                'sale_price' => 180.00,
                'SKU' => 'PDT0023',
                'quantity' => 30,
                'stock_status' => 'instock',
                'featured' => 0,
                'image' => 'default.jpg',
                'images' => 'gallery3.jpg,gallery4.jpg',
            ],
            [
                'name' => 'Product 3',
                'slug' => Str::slug('Product 3'),
                'category_id' => 2,
                'brand_id' => 1,
                'short_description' => 'Short description for product 3.',
                'description' => 'Detailed description for product 3.',
                'regular_price' => 200.00,
                'sale_price' => 180.00,
                'SKU' => 'PDT003',
                'quantity' => 30,
                'stock_status' => 'instock',
                'featured' => 0,
                'image' => 'default.jpg',
                'images' => 'gallery3.jpg,gallery4.jpg',
            ],
            [
                'name' => 'Product 4',
                'slug' => Str::slug('Product 4'),
                'category_id' => 2,
                'brand_id' => 1,
                'short_description' => 'Short description for product 4.',
                'description' => 'Detailed description for product 4.',
                'regular_price' => 200.00,
                'sale_price' => 180.00,
                'SKU' => 'PDT004',
                'quantity' => 30,
                'stock_status' => 'outofstock',
                'featured' => 0,
                'image' => 'default.jpg',
                'images' => 'gallery3.jpg,gallery4.jpg',
            ],
        ];

        // Insert data into the Product table
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

