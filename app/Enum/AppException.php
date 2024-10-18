<?php

namespace App\Enum;



enum AppException: string
{
    case INVALID_INPUT = 'Input nao enviado';
    case EMAIL_DE_USUARIO_JA_EXISTE = 'Email de usuario ja existe';
}
