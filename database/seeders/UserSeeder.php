<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // genarel user
        User::create([
            "name"=> "Frinds",
            "email"=> "user@gmail.com",
            "mobile" => "01723837483",
            "password"=> Hash::make("12345678"),
            "user_type" => "user"
        ]);

        // admin User
        User::create([
            "name"=> "Samad",
            "email"=> "admin@gmail.com",
            "mobile" => "01723837483",
            "password"=> Hash::make("12345678"),
            "user_type" => "admin"
        ]);

        // reseller user
        User::create([
            "name"=> "reseller",
            "email"=> "reseller@gmail.com",
            "mobile" => "01723837483",
            "password"=> Hash::make("12345678"),
            "user_type" => "reseller"
        ]);
    }
}
