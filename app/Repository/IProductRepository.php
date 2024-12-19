<?php

namespace App\Repository;

Interface IProductRepository {

    public function create(array $data);

    public function getById($id);

    public function getAll($filters = []);

    public function update($id, $data);

    public function delete($id);

}