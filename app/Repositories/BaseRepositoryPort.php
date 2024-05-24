<?php

namespace App\Repositories;

interface BaseRepositoryPort
{
    public function getById(int $id);
    public function all();
    public function getByAttribute(string $field, string $attribute);
    public function store(array $data);
    public function update(array $data, int $id);
    public function delete(int $id) ;
}
