<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteProductController extends Controller
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
     * Delete
     *
     * @urlParam product integer required The ID of the product to delete. Example: 1
     *
     * @response 200 {
     *   "message": "Success, 1 records deleted"
     * }
     * @response 500 {
     *   "error": "Error: Something went wrong"
     * }
     */
    public function __invoke(Request $request, int $productId): JsonResponse
    {
        try {
            $amout = $this->productService->deleteById($productId);
            return response()->json([
                'message' => "Sucess, {$amout} records deleted"
            ], Response::HTTP_OK);
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
