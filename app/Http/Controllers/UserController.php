<?php

namespace App\Http\Controllers;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UserController extends BaseController
{
    public function show()
    {
        return $this->success(
            'User retrieved successfully.',
            JWTAuth::user(),
            200
        );
    }
}
