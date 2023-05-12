<?php

namespace App\Http\Business;

use App\Http\Interfaces\LoginBusinessInterface;
use App\Http\Interfaces\LoginServiceInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginBusiness implements LoginBusinessInterface
{

    public function __construct(
        private LoginServiceInterface $loginService
     ) {}
    public function recuperaUsuario(array $data)
    {

        $verificaDadosUsuario = Auth::attempt($data);

        if ($verificaDadosUsuario) {
            $token = $this->loginService->geraToken();
            return [
                'token' => $token
            ];
        }

        throw new Exception('Usuário Inexistente');
    }

}
