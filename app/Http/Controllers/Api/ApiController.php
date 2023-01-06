<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    /**
     * Get guard.
     *
     * @param string $guard
     */
    protected function getGuard($guard = 'api')
    {
        return Auth::guard($guard);
    }

    /**
     * @param $result
     * @param $message
     * @param null|mixed $data
     * @return JsonResponse
     */
    protected function sendSuccess($data = null, $message = null): JsonResponse
    {
        $response = [
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    protected function sendError($statusCode = 500, $message = 'error'): JsonResponse
    {
        $response = [
            'error' => [
                'message' => $message,
            ],
        ];

        return response()->json($response, $statusCode);
    }
}
