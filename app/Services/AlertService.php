<?php

namespace App\Services;

class AlertService
{
    public static function successMessage($message): array
    {
        return [
            'alertMsg' => ['success' => $message],
            'statusCode' => 200,
        ];
    }

    public static function errorMessage($message): array
    {
        return [
            'alertMsg' => ['errorMsg' => $message],
            'statusCode' => 500,
        ];
    }
}
