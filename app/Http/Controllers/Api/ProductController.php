<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Texture;
use App\Models\Type;

class ProductController extends Controller
{

    public function home()
    {

        $products = Product::inRandomOrder()->limit(12)->get();
        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }

    public function data()
    {
        $textures = Texture::all();
        $brands = Brand::all();
        $types = Type::all();

        return response()->json([
            'success' => true,
            'results' => [$textures, $brands, $types]
        ]);
    }

    public function index()
    {


        $products = Product::with('brand', 'texture', 'type', 'colors')->get();
        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('brand', 'texture', 'type', 'colors')->first();

        return response()->json([
            'success' => true,
            'results' => $product
        ]);
    }
}
