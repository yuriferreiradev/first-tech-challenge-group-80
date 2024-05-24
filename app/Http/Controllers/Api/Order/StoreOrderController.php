<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\Ports\OrderServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class StoreOrderController extends Controller
{
    /**
     * @var OrderServicePort
     */
    protected OrderServicePort $orderService;

    /**
     * @param  OrderServicePort  $orderService
     */
    public function __construct(
        OrderServicePort $orderService,
    ) {
        $this->orderService = $orderService;
    }

    /**
     * @group Order
     *
     * Store
     *
     * @bodyParam products_id array required An array of product IDs to be included in the order. Example: [1, 2, 3]
     * @bodyParam products_id.* integer The ID of a product. Example: 1
     *
     * @response 201 {
     *   "data": {
     *     "client_id": 2,
     *     "id": 10
     *   },
     *   "message": "ok"
     * }
     * @response 500 {
     *   "error": "Error: Something went wrong"
     * }
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'products_id' => 'required|array',
            'products_id.*' => 'integer|exists:products,id'
        ]);

        try {
            $client_id = auth()->user()->id;
            $products_id = $request->input('products_id');

            $order = $this->orderService->create($client_id, $products_id);

            $response = [
                'data' => $order,
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

