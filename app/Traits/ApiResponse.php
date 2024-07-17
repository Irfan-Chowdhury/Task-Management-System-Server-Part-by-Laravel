<?php

namespace App\Traits;

trait ApiResponse {
    protected function success(string $message, int $statusCode=200) :object
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function error(string $message, int $statusCode=422) :object
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
}

