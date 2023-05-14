<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UserRepostiroyInterface;
use App\Models\User;

class UserRepository implements UserRepostiroyInterface
{

    public function __construct(
        private User $user
     ) {}
    public function verificaUsuario(array $data){

    }

    public function registra(array $data){
        $user = $this->user->create([
            User::EMAIL => $data['email'],
            User::PASSWORD => $data['password'],
        ]);

        return $user->createToken('token-registra')->plainTextToken;
    }
}
