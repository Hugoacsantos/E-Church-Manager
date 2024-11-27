<?php

namespace App\Services;

use App\DTO\AnnouncementsDTO;
use App\Models\Announcement;

class AnnouncementsService
{
    public function create(AnnouncementsDTO $announcementsDTO): Announcement {
        if($announcementsDTO->status === '') {
            $announcementsDTO->status = 'ativo';
        };
        $announcemnts = new Announcement();
        $announcemnts->criado_por = $announcementsDTO->criado_por;
        $announcemnts->titulo = $announcementsDTO->titulo;
        $announcemnts->aviso = $announcementsDTO->aviso;
        $announcemnts->status = $announcementsDTO->status;
        $announcemnts->criado_em = $announcementsDTO->criado_em;
        $announcemnts->save();

        return $announcemnts;
    }
}
