<?php

namespace App\Enum;

enum TypeUser: string
{
    case VISITANTE = 'Visitante';
    case MEMBRO = 'Membro';
    case PASTOR = 'Pastor';
}
