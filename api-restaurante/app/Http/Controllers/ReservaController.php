<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ReservaBusinessInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
