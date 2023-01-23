<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'texture', 'type', 'colors')->get();
        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }
}
