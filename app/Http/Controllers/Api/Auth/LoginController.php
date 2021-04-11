<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\Auth\AuthenticatesUsersTrait;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsersTrait;
}
