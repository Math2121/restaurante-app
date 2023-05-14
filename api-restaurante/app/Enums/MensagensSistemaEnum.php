<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class MensagensSistemaEnum extends Enum
{
    const LOGIN_EMAIL_OBRIGATORIO = "O campo email e obrigatório";
    const LOGIN_EMAIL_EXISTENTE = "Este email está sendo utilizado";

    const LOGIN_EMAIL_VALIDO= "Preencha um e-mail válido";

    const LOGIN_PASSWORD_OBRIGATORIO= "O campo senha e obrigatório";

    const RESERVA_NOME_OBRIGATORIO = "O campo nome e obrigatório";

    const RESERVA_DIA_OBRIGATORIO = "O campo dia e obrigatório";

    const RESERVA_HORARIO_OBRIGATORIO = "O campo hora e obrigatório";

    const RESERVA_DIA_VALIDO = "O campo dia precisa ser um valor válido";

    const RESERVA_HORARIO_VALIDO = "O campo horario precisa ser válido";

    const RESERVA_HORARIO_EXISTENTE = "Este horário já foi reservado";
}
