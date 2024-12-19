<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productservice;

    public function __construct(ProductService $productService)
    {
        $this->productservice = $productService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'category']);
        $products = $this->productservice->getAllProducts($filters);
        return response()->json($products, 200);
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product = $this->productservice->createProduct($validatedData);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = $this->productservice->getProductById($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = $this->productservice->updateProduct($id, $validatedData);
        if (!$product) {
            return response()->json(['message' => 'Product not found or update failed'], 404);
        }
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $deleted = $this->productservice->deleteProduct($id);
        if (!$deleted) {
            return response()->json(['message' => 'Product not found or deletion failed'], 404);
        }
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
