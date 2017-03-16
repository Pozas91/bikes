<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request) {
        return $request->user();
    }

    public function getBikes(Request $request) {
        return $request->user()->bikes;
    }
}