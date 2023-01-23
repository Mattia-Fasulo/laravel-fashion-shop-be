<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('dataseeder.products');

        foreach($products as $product) {
            $new_product = new Product();
            $new_product->name = $product['name'];
            $new_product->slug = Product::generateSlug($new_product->name);
            $new_product->name = $product['name'];
        }
    }
}
