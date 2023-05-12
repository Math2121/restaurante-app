<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class MensagensSistemaEnum extends Enum
{
    const LOGIN_EMAIL_OBRIGATORIO = "O campo email e obrigatório";
    const LOGIN_EMAIL_EXISTENTE = "Este email está sendo utilizado";

    const LOGIN_EMAIL_VALIDO= "Preencha um e-mail válido";

    const LOGIN_PASSWORD_OBRIGATORIO= "O campo senha e obrigatório";
}
