<?php

namespace App\Http\Requests;

use App\Enums\MensagensSistemaEnum;
use App\Models\Reserva;
use Illuminate\Foundation\Http\FormRequest;

class CadastraReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            Reserva::NAME => 'required',
            Reserva::DIA => 'required|date',
            Reserva::HORARIO => 'required|date_format:H:i|unique:reserva,horario'
        ];
    }


    public function messages(): array
    {
        return [
            'nome.required' => MensagensSistemaEnum::RESERVA_NOME_OBRIGATORIO,
            'dia.required' => MensagensSistemaEnum::RESERVA_DIA_OBRIGATORIO,
            'dia.date' => MensagensSistemaEnum::RESERVA_DIA_VALIDO,
            'horario.required' => MensagensSistemaEnum::RESERVA_HORARIO_OBRIGATORIO,
            'horario.date_format' => MensagensSistemaEnum::RESERVA_HORARIO_VALIDO,
            'horario.unique' => MensagensSistemaEnum::RESERVA_HORARIO_EXISTENTE,
        ];
    }
}
