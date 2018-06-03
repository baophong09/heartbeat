<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class UserController extends Controller
{
    public function me() {
        $user = JWTAuth::toUser($request->header('Authorization'));
        return response()->json(['success' => true, 'result' => $user]);
    }
}
