<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reserva::class;
    public function definition(): array
    {
        $date = fake()->date;
        $time = fake()->time;


        $existingRecord = Reserva::where('horario', $time)->exists();


        while ($existingRecord) {
            $time = fake()->time;
            $existingRecord = Reserva::where('horario', $time)->exists();
        }


        return [
            'nome' => fake()->name(),
            'dia' => $date,
            'horario' => $time
        ];
    }
}
