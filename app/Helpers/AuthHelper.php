<?php

namespace App\Helpers;

/**
 *
 */
trait AuthHelper {

    /**
     * @param $user
     * @return array
     */
    public function generateToken($user){

        $tokenObject =  $user->createToken(config('app.name'));

        return [
            'token' => $tokenObject->plainTextToken,
            'token_type' => 'Bearer',
            'user' => $user,
        ];
    }

}
