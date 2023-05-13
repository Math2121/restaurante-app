<?php

namespace Tests\Unit;

use App\Http\Business\ReservaBusiness;
use App\Http\Interfaces\ReservaRepositoryInterface;
use App\Models\Reserva;
use Tests\TestCase;

class ReservaBusinessTest extends TestCase
{

    private $reservaRepository;
    protected function setUp(): void
    {
        parent::setUp();


        $this->reservaRepository = $this->createMock(ReservaRepositoryInterface::class);
    }

    public function test_deve_retornar_reservas(){
        $this->reservaRepository->method('retornaReservas')
        ->willReturn($this->reservas());

        $business = $this->instanciaReserva();

        $reservas = $business->recuperaReservas();

        $this->assertIsArray($reservas);

    }

    public function reservas(){
        return [
            Reserva::make([
                Reserva::NAME => 'John Doe',
                Reserva::DIA => '2023-05-13',
                Reserva::HORARIO => '12:00'
            ])
        ];
    }


    public function instanciaReserva(){
        return new ReservaBusiness(
            $this->reservaRepository
        );
    }
}
