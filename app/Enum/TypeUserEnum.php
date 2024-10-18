<?php

namespace App\Enum;

enum TipoUserEnum: string
{
    case MEMBRO = 'Membro';
    case VISITANTE = 'Visitante';
    case PASTOR = 'Pastor';
}
