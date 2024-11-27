<?php

namespace App\Http\Controllers\Announcements;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnnouncementsRequest;
use App\Services\AnnouncementsService;


class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateAnnouncementsRequest $request, AnnouncementsService $announcementsService)
    {
        $announcements = $announcementsService->create($request->toDTO());

        return response()->json($announcements);
    }
}
