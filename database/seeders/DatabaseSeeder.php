<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);

        Category::factory(12)->create();

        Provider::factory(12)->create();

        Product::factory(12)->create();

        Customer::factory(12)->create();
    }
}
