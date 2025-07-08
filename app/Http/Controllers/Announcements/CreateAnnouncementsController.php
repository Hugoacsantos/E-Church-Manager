<?php

namespace App\Http\Controllers\Announcements;

use App\Actions\Announcements\CreateAnnouncements;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnnouncementsRequest;
use App\Services\AnnouncementsService;


class CreateAnnouncementsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateAnnouncementsRequest $request, CreateAnnouncements $createAnnouncements)
    {
        $data = $request->toDTO();
        
        $announcements = $createAnnouncements->execute($data);

        return response()->json($announcements, status: 201);
    }
}
