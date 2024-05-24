<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\Ports\OrderServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexOrderController extends Controller
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
     * Index
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "status": "received",
     *       "clients": {
     *         "id": 1,
     *         "name": "Test",
     *         "document": "000.000.00-00"
     *       },
     *       "products": [
     *         {
     *           "id": 3,
     *           "name": "Beer",
     *           "price": "14.90"
     *         },
     *         {
     *           "id": 5,
     *           "name": "Cheeseburger",
     *           "price": "29.90"
     *         }
     *       ]
     *     }
     *   ]
     * }
     */
    public function __invoke(Request $request): JsonResponse
    {
        $orders = $this->orderService->getAll();

        return response()->json(['data' => $orders], Response::HTTP_OK);
    }
}

