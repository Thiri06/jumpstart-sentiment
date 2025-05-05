<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,      // First create users
            ProductSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
