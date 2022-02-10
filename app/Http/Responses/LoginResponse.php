<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
	/**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
    	if ($request->wantsJson()) {
    		$user = auth()->user();
    		return response()->json([
	        	'access_token' 	=> $user->createToken($user->tokenName($request))->plainTextToken,
				'token_type'	=> 'Bearer',
                'user'          => [
                    'email'     => $user->email,
                    'name'  => $user->fullname
                ]
	        ]);
    	}

    	return redirect()->intended(config('fortify.home'));
    }
}
