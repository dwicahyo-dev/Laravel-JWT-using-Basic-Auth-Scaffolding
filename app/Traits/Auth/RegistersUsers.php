<?php

namespace App\Traits\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return new JsonResponse([
            'status' => 'Success',
            'data' => [
                'user' => $user,
                'status_code' => 201,
                'token_type' => 'Bearer',
                'access_token' => $user->createToken('token-auth')->plainTextToken,
            ]
        ], 201);
    }
}
