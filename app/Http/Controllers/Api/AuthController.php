<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

/**
 * @group Authentication
 *
 * Endpoints for managing authentication.
 */
class AuthController extends Controller
{
    use ApiResponses;

    /**
     * Login
     *@unauthenticated
     * @param ApiLoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(ApiLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid Credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'API Token for' .
                        $user->email
                )->plainTextToken
            ]
        );
    }
}
