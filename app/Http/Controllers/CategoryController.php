<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
        
    }

    public function index()
    {
        $categories = $this->categoryService->getCategories();
        
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->createCategory($request);

        return redirect()->route('categories.index')->with('success', 'Категория успешно создана.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->updateCategory($request, $category);

        return redirect()->route('categories.index')->with('success', 'Категория успешно обновлена.');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category);
        
        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена.');
    }
}
