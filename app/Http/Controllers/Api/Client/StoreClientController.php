<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\Ports\ClientServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class StoreClientController extends Controller
{
    protected ClientServicePort $clientService;

    public function __construct(
        ClientServicePort $clientService,
    ) {
        $this->clientService = $clientService;
    }

    /**
     * @group Client
     *
     * Store
     *
     *
     * @bodyParam name string required The name of the client. Example: John Doe
     * @bodyParam document string required The document of the client. Must follow the format "000.000.000-00".
     *
     * @response 201 {
     *   "data": {
     *     "name": "John Doe",
     *     "document": "000.000.000-00",
     *     "id": 1
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
            $name     = $request->input('name');
            $document = $request->input('document');

            $data = [
                'name' => $name,
                'document' => $document,
            ];

            $client = $this->clientService->create($data);

            $response = [
                'data' => $client,
                'message' => 'ok',
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
