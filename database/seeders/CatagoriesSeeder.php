<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatagoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'image' => null,
                'parent_id' => 1,
            ],
            [
                'name' => 'Mobiles',
                'slug' => Str::slug('Mobiles'),
                'image' => null,
                'parent_id' => 2, // Parent category ID for Electronics
            ],
            [
                'name' => 'Laptops',
                'slug' => Str::slug('Laptops'),
                'image' => null,
                'parent_id' => 3, // Parent category ID for Electronics
            ],
            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'image' => null,
                'parent_id' => 4,
            ],
            [

                'name' => 'Men',
                'slug' => Str::slug('Men'),
                'image' => null,
                'parent_id' => 5, // Parent category ID for Fashion
            ],
            [
                'name' => 'Women',
                'slug' => Str::slug('Women'),
                'image' => null,
                'parent_id' => 6, // Parent category ID for Fashion
            ],
        ];

        foreach ($categories as $category) {
            Catagory::create($category);

        }
    }
}
