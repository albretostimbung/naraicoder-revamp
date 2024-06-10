<?php

namespace App\Constants;

class HttpStatusCodes
{

    const ok = 200;
    const notFound = 404;


    public static function getMessage($statusCode)
    {
        switch ($statusCode) {
            case self::ok: return 'OK';
            case self::notFound: return 'Not Found';
            default: return 'Unknown';
        }
    }
}
