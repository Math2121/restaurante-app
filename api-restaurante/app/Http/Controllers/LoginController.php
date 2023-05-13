<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\LoginBusinessInterface;
use App\Http\Interfaces\LoginInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistraRequest;
use Illuminate\Http\Response;

class LoginController extends Controller
{

    public function __construct(
       private LoginBusinessInterface $loginBusiness
    ) {}

    public function login(LoginRequest $request) {

        $usuario = $this->loginBusiness->recuperaUsuario($request->all());

        return response()->json($usuario, Response::HTTP_ACCEPTED);
    }

    public function registra(RegistraRequest $request){

        $token = $this->loginBusiness->registraUsuario($request->all());

        return response()->json(['token' => $token], Response::HTTP_CREATED);
    }
}
