<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ReservaBusinessInterface;
use App\Http\Requests\CadastraReservaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Termwind\Components\Dd;

class ReservaController extends Controller
{
    //
    public function __construct(
        private ReservaBusinessInterface $reservaBusiness
     ) {}
    public function listarReservas(){
        $reservas = $this->reservaBusiness->recuperaReservas();

        return response()->json($reservas, Response::HTTP_ACCEPTED);
    }

    public function cadastroReserva(CadastraReservaRequest $request){
   
        $reserva = $this->reservaBusiness->cadastrarReseva($request->all());

        return response()->json($reserva, Response::HTTP_CREATED);
    }
}
