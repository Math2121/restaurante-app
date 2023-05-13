<?php

namespace App\Http\Business;


use App\Http\Interfaces\ReservaBusinessInterface;
use App\Http\Interfaces\ReservaRepositoryInterface;

class ReservaBusiness implements ReservaBusinessInterface
{

    public function __construct(
        private ReservaRepositoryInterface $reservaRepository
    ) {
    }
    public function recuperaReservas()
    {
        $reservas = $this->reservaRepository->retornaReservas();

        return $reservas;
    }

    public function cadastrarReseva(array $data){
        
    }
}
