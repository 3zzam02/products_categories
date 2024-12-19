<?php

namespace App\Repository;
use App\Models\Product;


Class ProductRepository implements IProductRepository {

    public function getAll($filters = []) 
    {
        $query = Product::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('name', 'like', "%{$filters['category']}%");
            });
        }

        return $query->get();
    }
    public function getById($id) 
    {
        return Product::find($id);
    }
    public function create(array $data) 
    {
        return Product::create($data);
    }

    public function update($id, $data) 
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        return $product;
    }

    public function delete($id) 
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return true;
    }
}