<?php


namespace App\Http\Interfaces;
interface LoginBusinessInterface
{
	public function recuperaUsuario(array $data);
    public function registraUsuario(array $data);
}
