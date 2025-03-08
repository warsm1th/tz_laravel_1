<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService)
    {

    }

    public function index()
    {
        $products = $this->productService->getProducts();
        
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->getCategories();

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->productService->createProduct($request);

        return redirect()->route('products.index')->with('success', 'Товар успешно добавлен.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->productService->getCategories();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->updateProduct($request, $product);

        return redirect()->route('products.index')->with('success', 'Товар успешно обновлен.');
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);

        return redirect()->route('products.index')->with('success', 'Товар успешно удален.');
    }
}