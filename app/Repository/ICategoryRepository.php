<?php

namespace App\Repository;

Interface ICategoryRepository {

    public function create(array $data);

    public function getById($id);

    public function getAll();

    public function update($id, $data);

    public function delete($id);


}