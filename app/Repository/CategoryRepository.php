<?php

namespace App\Repository;
use App\Models\Category;

Class CategoryRepository implements ICategoryRepository {

    public function getAll() 
    {
        return Category::all();
    }
    public function getById($id) 
    {
        return Category::find($id);
    }
    public function create($data)
    {
        return Category::create($data);
    }

    public function update($id, $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return true;
    }
}
