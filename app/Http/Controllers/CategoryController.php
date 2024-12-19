<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryservice;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryservice = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryservice->getAllCategories();
        return response()->json($categories, 200);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = $this->categoryservice->createCategory($validatedData);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = $this->categoryservice->getCategoryById($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category, 200);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = $this->categoryservice->updateCategory($id, $validatedData);
        if (!$category) {
            return response()->json(['message' => 'Category not found or update failed'], 404);
        }
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $deleted = $this->categoryservice->deleteCategory($id);
        if (!$deleted) {
            return response()->json(['message' => 'Category not found or deletion failed'], 404);
        }
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
