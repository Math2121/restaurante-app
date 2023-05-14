<?php


namespace App\Http\Interfaces;
interface ReservaRepositoryInterface
{
	public function retornaReservas();
    public function contandoReservas();

    public function criaReserva(array $data);
}
