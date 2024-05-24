<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\Ports\AuthServicePort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class LogoutController extends Controller
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
     * Logout
     *
     * @header Authorization string required The Bearer token of the authenticated user. Example: "Bearer {token}"
     *
     * @response 200 {
     *   "message": "Logged out successfully"
     * }
     * @response 400 {
     *   "message": "Token not provided"
     * }
     * @response 500 {
     *   "error": "Error: A general error has occurred"
     * }
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $token = $request->bearerToken();

            if (!$token) {
                return response()->json(['message' => 'Token not provided'], Response::HTTP_BAD_REQUEST);
            }

            $this->authService->logout($token);

            $response = [
                'message' => 'Logged out successfully'
            ];

            return response()->json($response, Response::HTTP_OK);
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


