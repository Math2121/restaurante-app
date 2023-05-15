<?php

namespace App\Http\Services;


use App\Http\Interfaces\LoginServiceInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Response;

class LoginService implements LoginServiceInterface
{

    public function geraToken()
    {
        $user = Auth::user();
        return $user->createToken('token-login')->plainTextToken;
    }
}
