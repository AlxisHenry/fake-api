<?php

namespace App;

use Illuminate\Support\Facades\Route;

class Api
{

    public function __construct() {

    }

    public static function getJsonResponse(int $code, string $target = ''): array
    {
        return [
            "code" => $code,
            "target" => $target,
            "parameters" => Route::current()->parameters,
        ];
    }


}
