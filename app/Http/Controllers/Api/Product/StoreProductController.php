<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class StoreProductController extends Controller
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
     * Store
     *
     * @bodyParam name string required The name of the product. Example: "New Product"
     * @bodyParam price number required The price of the product. Example: 19.99
     *
     * @response 201 {
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
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $product = $this->productService->create($request->all());

            $response = [
                'data' => $product,
                'message' => 'ok',
            ];

            return response()->json($response, Response::HTTP_CREATED);
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


