<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ApiKeyChecker;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\JsonResponse;
use App\Api;

class ApiController extends Controller
{

    public function __construct() {
        $this->middleware(ApiKeyChecker::class, ['except' => 'TokenIsMissing']);
    }

    public function TokenIsMissing(): JsonResponse
    {
        return Response::json([
            "response" => Api::getJsonResponse( 401),
            "body" => [
                'auth_failed' => 'Please fill in the correct token',
                'url_error' => 'Please enter a valid url'
            ],
            "tips" => [
                'uri' => 'https://api.alexishenry.eu/API_KEY/target',
                'targets' => [
                    'password',
                    'security'
                ]
            ]
        ]);
    }

    public function ValidToken(): JsonResponse
    {
        return Response::json([
            "response" => Api::getJsonResponse( 204),
            "body" => [
                'content' => null,
            ],
        ]);
    }

    public function PasswordSecurity(): JsonResponse
    {
        return Response::json([
            "response" => Api::getJsonResponse( 200, 'password'),
            "body" => [
                "password_security" => [
                    "length" => [
                        "min" => 8,
                        "max" => 250
                    ]
                ]
            ]
        ]);
    }

}
