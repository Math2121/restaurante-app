<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    const NAME = 'nome';
    const HORARIO = 'horario';
    const DIA = 'dia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME,
        self::HORARIO,
        self::DIA,
    ];

    protected $table = 'reserva';

}
