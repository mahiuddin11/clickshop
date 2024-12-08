<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => Str::slug('Apple'),
                'image' => null,

            ],
            [
                'name' => 'Samsung',
                'slug' => Str::slug('Samsung'),
                'image' => null,
            ],
            [
                'name' => 'Nike',
                'slug' => Str::slug('Nike'),
                'image' => null,
            ],
            [
                'name' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'image' => null,
            ],
            [
                'name' => 'Sony',
                'slug' => Str::slug('Sony'),
                'image' => null,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);

        }
    }
}
