<?php

namespace App\Http\Requests;

use App\Enums\MensagensSistemaEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistraRequest extends FormRequest
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

            User::PASSWORD => 'required',
            User::EMAIL => 'required|email|string|unique:users,email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => MensagensSistemaEnum::LOGIN_EMAIL_OBRIGATORIO,
            'email.email' => MensagensSistemaEnum::LOGIN_EMAIL_VALIDO,
            'email.exists' => MensagensSistemaEnum::LOGIN_EMAIL_EXISTENTE,
            'password.required' => MensagensSistemaEnum::LOGIN_PASSWORD_OBRIGATORIO,
        ];
    }
}
