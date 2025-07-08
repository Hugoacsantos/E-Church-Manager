<?php
declare(strict_types=1);


namespace App\Actions\Announcements;

use App\DTO\AnnouncementsDTO;
use App\Models\Announcement;

readonly class CreateAnnouncements {


    public function execute(AnnouncementsDTO $announcementsDTO): Announcement {
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