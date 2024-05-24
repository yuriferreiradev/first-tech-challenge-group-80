<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class UpdateProductController extends Controller
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
     * Update
     *
     * @urlParam product integer required The ID of the product to delete. Example: 1
     *
     * @bodyParam name string nullable The name of the product. Example: "Edited Product"
     * @bodyParam price number nullable The price of the product. Example: 29.99
     *
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "name": "New Product",
     *     "price": 19.99
     *   },
     *   "message": "ok"
     * }
     * @response 500 {
     *   "error": "Error: Something went wrong"
     * }
     */
    public function __invoke(int $productId, Request $request): JsonResponse
    {
        try {
            $this->productService->updateById($request->all(), $productId);
            return response()->json(['message' => 'ok'], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                [
                    'error' => 'Error' . $e->getMessage()
                ]
                , Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
