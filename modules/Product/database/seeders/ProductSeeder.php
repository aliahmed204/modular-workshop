<?php

namespace Modules\Product\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::query()->create([
            "name" => "expensive air fryer",
            "description" => "This is the best air fryer you can buy.",
            "price" => 100,
            "stock" => 10
        ]);

        Product::query()->create([
            "name" => "A futuristic MacBook Pro M3",
            "description" => "This is the best laptop you can buy.",
            "price" => 500,
            "stock" => 10
        ]);
    }
}
