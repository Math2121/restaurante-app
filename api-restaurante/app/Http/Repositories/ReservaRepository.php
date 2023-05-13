<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ReservaRepositoryInterface;
use App\Models\Reserva;

class ReservaRepository implements ReservaRepositoryInterface
{

    public function retornaReservas(){
        return Reserva::all([
            Reserva::NAME, Reserva::DIA, Reserva::HORARIO
        ]);
    }
}
