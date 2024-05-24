<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\Ports\AuthServicePort;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class LoginController extends Controller
{
    /**
     * @var AuthServicePort
     */
    protected AuthServicePort $authService;

    /**
     * @param  AuthServicePort  $authService
     */
    public function __construct(
        AuthServicePort $authService,
    ) {
        $this->authService = $authService;
    }

    /**
     * @group Auth
     *
     * Login
     *
     * @bodyParam document string required The document of the client. Must follow the format. Example: "000.000.000-00".
     *
     * @response 200 {
     *   "data": {
     *     "token": "1|tBxR3nEX07K9oAuwpf2DBNd5uyvydTan2dExMEqW4031029"
     *   }
     * }
     * @response 500 {
     *   "error": "Error: Something went wrong"
     * }
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'document' => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            ]);

            $document = $validated['document'];

            $token = $this->authService->login($document);

            $response = [
                'token' => $token,
            ];

            return response()->json(['data' => $response], Response::HTTP_OK);
        } catch (HttpResponseException $e) {
            return response()->json(
                [
                    'error' => $e->getResponse()->getData()->error
                ],
                $e->getResponse()->getStatusCode()
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'error' => 'Error: A general error has occurred'
                ]
                , Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}


