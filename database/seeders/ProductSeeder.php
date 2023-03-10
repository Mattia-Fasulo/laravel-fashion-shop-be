<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //il codice sotto va decommentato se si vuole evitare il blocco della foreignKey 
        DB::statement("SET foreign_key_checks = 0;");
        Product::truncate();

        $products = config('dataseeder.products');

        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->type_id = $product['category_id'];
            $new_product->texture_id = $product['texture_id'];
            $new_product->brand_id = $product['brand_id'];
            $new_product->name = $product['name'];
            $new_product->slug = Product::generateSlug($new_product->name);
            $new_product->description = $product['description'];
            $new_product->price = $product['price'];
            $new_product->price_sign = $product['price_sign'];
            $new_product->rating = $product['rating'];
            $new_product->cover_image = ProductSeeder::storeimage($product['api_featured_image']);
            $new_product->save();

            DB::statement("SET foreign_key_checks = 1;");
        }
    }

    public static function storeimage($img)
    {
        $url = 'https:' . $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}