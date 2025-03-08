<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductService
{
    public function getProducts()
    {
        return Product::with('category')->get();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function createProduct(ProductRequest $request)
    {
        $validatedData = $request->validated();

        return Product::create($validatedData);
    }

    public function updateProduct(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);

        return $product;
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
    }
}