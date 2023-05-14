<?php


namespace App\Http\Interfaces;


interface ReservaBusinessInterface
{
	public function recuperaReservas();
    public function cadastrarReseva(array $data);
}
