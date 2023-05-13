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

    public function contandoReservas(){
        $count = Reserva::all()->count();

        return  $count;
    }

    public function criaReserva(array $data){
        $reserva = Reserva::create([
            Reserva::NAME => $data['nome'],
            Reserva::DIA => $data['dia'],
            Reserva::HORARIO => $data['horario'],
        ]);

        return $reserva;
    }
}
