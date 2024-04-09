<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Friend;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed 10 users
        for ($i = 0; $i < 70; $i++) {
            $username = $faker->unique()->userName; // Unique username
            $temp_email = $faker->unique()->email; // Unique email
            $mobile = $faker->unique()->phoneNumber; // Unique mobile
            $password = Hash::make($faker->password); 
            // Insert user record
            Friend::create([
                'username' => $username,
                'temp_email' => $temp_email,
                'mobile' => $mobile,
                'password' => $password
            ]);
        }
    }
}
