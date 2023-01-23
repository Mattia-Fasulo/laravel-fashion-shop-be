<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config('dataseeder.brands');
        // dd($brands);
        foreach($brands as $brand){
            $new_brand = new Brand();
            $new_brand->name = $brand;
            $new_brand->slug = Brand::generateSlug($brand);
            $new_brand->save();
        }
    }
}
