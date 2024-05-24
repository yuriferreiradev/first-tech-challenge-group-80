<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SearchProductByCategoryController extends Controller
{
    /**
     * @var ProductServicePort
     */
    protected ProductServicePort $productService;

    /**
     * @param  ProductServicePort  $productService
     */
    public function __construct(
        ProductServicePort $productService,
    ) {
        $this->productService = $productService;
    }

    /**
     * @group Product
     *
     * Search By Category
     *
     * @urlParam category integer required The ID of the category to search. Example: 1
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Product 1",
     *       "price": 100,
     *       "category_id": 1
     *     },
     *     {
     *       "id": 2,
     *       "name": "Product 2",
     *       "price": 200,
     *       "category_id": 1
     *     }
     *   ]
     * }
     */
    public function __invoke(int $categoryId): JsonResponse
    {
        $data = $this->productService->getAllByCategoryId($categoryId);

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
