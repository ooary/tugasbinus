<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;

class ProductCustomerSeeder extends Seeder
{
    public function run()
    {
        // Create 50 products
        Product::factory()->count(50)->create()->each(function ($product) {
            $product->calculateSalesPrice();
        });

        // Create 20 customers
        Customer::factory()->count(20)->create();
    }
}
