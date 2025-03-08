<?php

namespace App\Services;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryService
{
    public function getCategories()
    {
        $categories = Category::all();

        return $categories;
    }

    public function createCategory(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        
        return Category::create($validatedData);
    }

    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $category->update($validatedData);

        return $category;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}