<?php

namespace App\Helpers;

use App\Constants\HttpStatusCodes;

class ResponseFormatter
{
    protected static $statusCodeOk;

    protected static $statusMessage;

    public static function setDefaultStatusCode()
    {
        self::$statusCodeOk = HttpStatusCodes::ok;
        self::$statusMessage = HttpStatusCodes::getMessage(self::$statusCodeOk);
    }

    public static function success($data = null, $totalPage = null, $currentPage = null)
    {
        self::setDefaultStatusCode();
        $response = [
            'code' => self::$statusCodeOk,
            'message' => self::$statusMessage,
            'data' => $data,
        ];

        if ($totalPage !== null) {
            $response['total_page'] = $totalPage;
        }

        if ($currentPage !== null) {
            $response['current_page'] = $currentPage;
        }

        return response()->json($response, self::$statusCodeOk);
    }

    public static function error($message, $code)
    {
        self::setDefaultStatusCode();
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => [],

        ];

        return response()->json($response, self::$statusCodeOk);
    }

    public static function handleServiceException($exception)
    {
        self::setDefaultStatusCode();
        $message = $exception->getMessage();
        $code = $exception->getCode();

        $response = [
            'code' => $code ?: 500,
            'message' => $message ?: 'Internal Server Error',
            'data' => null,
        ];

        return response()->json($response, self::$statusCodeOk);
    }
}
