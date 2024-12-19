<?php
namespace App\Services;

use App\Repository\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProducts($filters = [])
    {
        return $this->repository->getAll($filters);
    }
    public function getProductById($id)
    {
        return $this->repository->getById($id);
    }

    public function createProduct($data)
    {
        return $this->repository->create($data);
    }

    public function updateProduct($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->repository->delete($id);
    }
}