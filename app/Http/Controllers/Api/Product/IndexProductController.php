<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexProductController extends Controller
{
    protected ProductServicePort $productService;

    public function __construct(
        ProductServicePort $productService,
    ) {
        $this->productService = $productService;
    }

    /**
     * @group Product
     *
     * Index
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Product 1",
     *       "price": 100
     *     },
     *     {
     *       "id": 2,
     *       "name": "Product 2",
     *       "price": 200
     *     }
     *   ]
     * }
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = $this->productService->getAll();
        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
