<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\Ports\ProductRepositoryPort;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Database\Eloquent\Collection;

class ProductServiceAdapter implements ProductServicePort
{
    /**
     * @var ProductRepositoryPort
     */
    protected ProductRepositoryPort $productRepository;

    /**
     * @param ProductRepositoryPort $productRepository
     */
    public function __construct(ProductRepositoryPort $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param  array  $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return $this->productRepository->create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->productRepository->all();
    }

    /**
     * @param  int  $idCategory
     * @return Collection
     */
    public function getAllByCategoryId(int $idCategory): Collection
    {
        return $this->productRepository->getByAttribute('category_id', $idCategory)->get();
    }

    /**
     * @param  array  $data
     * @param  int  $id
     * @return int
     */
    public function updateById(array $data, int $id): int
    {
        return $this->productRepository->updateById($data, $id);
    }

    /**
     * @param  int  $id
     * @return int
     */
    public function deleteById(int $id): int
    {
        return $this->productRepository->deleteById($id);
    }
}
