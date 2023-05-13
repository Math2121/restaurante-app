<?php


namespace App\Http\Interfaces;
interface UserRepostiroyInterface
{
	public function verificaUsuario(array $data);

    public function registra(array $data);
}
