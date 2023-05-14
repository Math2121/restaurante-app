<?php

namespace Tests\Unit;

use App\Http\Business\ReservaBusiness;
use App\Http\Interfaces\ReservaRepositoryInterface;
use App\Models\Reserva;
use Carbon\Carbon;
use Exception;
use Tests\TestCase;

class ReservaBusinessTest extends TestCase
{

    private $reservaRepository;
    protected function setUp(): void
    {
        parent::setUp();


        $this->reservaRepository = $this->createMock(ReservaRepositoryInterface::class);
    }

    public function test_deve_retornar_reservas()
    {
        $this->reservaRepository->method('retornaReservas')
            ->willReturn($this->reservas());

        $business = $this->instanciaReserva();

        $reservas = $business->recuperaReservas();

        $this->assertIsArray($reservas);
    }

    public function test_nao_deve_fazer_reserva_no_domingo()
    {
        Carbon::now()->startOfWeek()->setISODate(2023, 1);
        $this->expectException(Exception::class);

        $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-13",
            "horario" => "19:00"
        ]);

        $this->expectExceptionMessage('Reservas não são feitas aos domingos');
    }

    public function test_nao_deve_fazer_reserva_fora_do_horario()
    {
        Carbon::now()->setTime(17, 30, 0);
        $this->expectException(Exception::class);

       $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-13",
            "horario" => "19:00"
        ]);

        $this->expectExceptionMessage('Reservas são permitidas apenas de 18:00 às 23:59');
    }

    public function test_nao_deve_permitir_horario()
    {

        $this->expectException(Exception::class);

        $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-14",
            "horario" => "17:00"
        ]);

        $this->expectExceptionMessage('Reservas são permitidas apenas de 18:00 às 23:59');
    }

    public function test_nao_deve_permitir_domingo()
    {

        $this->expectException(Exception::class);

         $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-14",
            "horario" => "18:00"
        ]);

        $this->expectExceptionMessage('Reservas não são feitas aos domingos');
    }

    public function test_deve_fazer_reserva()
    {
        Carbon::setTestNow(Carbon::now()->startOfWeek()->addDays(2)->setTime(18, 30, 0));

        $this->reservaRepository->method('criaReserva')
        ->willReturn($this->reservas()[0]);

        $reserva = $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-13",
            "horario" => "18:00"
        ]);

        $this->assertInstanceOf(Reserva::class, $reserva);

    }

    public function test_nao_deve_permitir_mais_reservas()
    {
        $this->expectException(Exception::class);

        Carbon::setTestNow(Carbon::now()->startOfWeek()->addDays(2)->setTime(18, 30, 0));

        $this->reservaRepository->method('contandoReservas')
        ->willReturn(16);

         $this->instanciaReserva()->cadastrarReseva([
            "nome" => "Matheus",
            "dia" => "2023-05-13",
            "horario" => "18:00"
        ]);


        $this->expectExceptionMessage('Todas as mesas foram reservadas');
    }

    public function reservas()
    {
        return [
            Reserva::make([
                Reserva::NAME => 'John Doe',
                Reserva::DIA => '2023-05-13',
                Reserva::HORARIO => '12:00'
            ])
        ];
    }


    public function instanciaReserva()
    {
        return new ReservaBusiness(
            $this->reservaRepository
        );
    }
}
