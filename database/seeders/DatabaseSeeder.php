<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Catagory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(CatagoriesSeeder::class);
        $this->call(BrandSeeder::class);
    }
}
