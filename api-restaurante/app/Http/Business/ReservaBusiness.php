<?php

namespace App\Http\Business;

use App\Http\Exception\ReservaException;
use App\Http\Interfaces\ReservaBusinessInterface;
use App\Http\Interfaces\ReservaRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        $this->validaDiaSemana();
        $this->validaHorario();
        $this->verificaHorario($data['horario']);

        $quantidadeReservas = $this->reservaRepository->contandoReservas();
        if($quantidadeReservas >= 15){
            throw new \Exception("Todas as mesas foram reservadas");
        }

        $reserva = $this->reservaRepository->criaReserva($data);

        return $reserva;

    }

    private function validaDiaSemana(){

        $dataAtual = Carbon::now();
        if($dataAtual->dayOfWeek === Carbon::SUNDAY){
            throw new Exception("Reservas não são feitas aos domingos");
        }
    }

    private function validaHorario(){
        $dataAtual = Carbon::now();
        $inicial = Carbon::createFromTime(18, 0, 0); // 18:00
        $final = Carbon::createFromTime(23, 59, 59); // 23:59

        if ($dataAtual->lessThan($inicial) || $dataAtual->greaterThan($final)) {
            throw new Exception("Reservas são permitidas apenas de 18:00 às 23:59");
        }
    }

    private function verificaHorario($horario){
        $horarioPermitido = strtotime('18:00:00');
        $horarioFinal = strtotime('23:59:59');
        $horarioRecebido = strtotime($horario);

        if ($horarioRecebido < $horarioPermitido || $horarioRecebido > $horarioFinal) {
            throw new Exception("Reservas são permitidas apenas de 18:00 às 23:59");
        }

    }
}
