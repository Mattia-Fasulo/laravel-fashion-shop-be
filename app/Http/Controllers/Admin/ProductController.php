<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Texture;
use App\Models\Type;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::all();
        $types = Type::all();
        $brands = Brand::all();
        $textures = Texture::all();
        // dd($products);

        return view('admin.products.index', compact('products', 'types', 'brands', 'textures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        $types = Type::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $colors = Color::all();

        return view('admin.products.create', compact('products', 'types', 'brands', 'textures', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        // dd($request);
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_image')) {
            $path = Storage::put('projects_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_product = Product::create($data);

        if ($request->has('types')) {
            $new_product->types()->attach($request->types);
        }

        if ($request->has('brands')) {
            $new_product->tags()->attach($request->brands);
        }

        if ($request->has('textures')) {
            $new_product->textures()->attach($request->textures);
        }
        if ($request->has('colors')) {
            $new_product->colors()->attach($request->colors);
        }
        //dd($new_product);

        return redirect()->route('admin.products.show', $new_product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $colors = Color::all();

        return view('admin.products.edit', compact('product', 'types', 'brands', 'textures', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        // dd($request);
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_image')) {
            if ($product->overview_image) {
                Storage::delete($product->overview_image);
            }
            $path = Storage::disk('public')->put('images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $product->update($data);

        if ($request->has('types')) {
            $product->types()->sync($request->types);
        }

        if ($request->has('brands')) {
            $product->tags()->sync($request->brands);
        }

        if ($request->has('textures')) {
            $product->textures()->sync($request->textures);
        }
        if ($request->has('colors')) {
            $product->colors()->sync($request->colors);
        }
        //dd($new_product);

        return redirect()->route('admin.products.index')->with('message', "$product->name updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->action([ProductController::class, 'index'])->with('message', "$product->name deleted");
    }
}
