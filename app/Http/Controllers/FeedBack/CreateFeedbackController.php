<?php

namespace App\Http\Controllers\FeedBack;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeedBackRequest;
use App\Services\FeedbackServices;
use Illuminate\Http\Request;

class CreateFeedbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateFeedBackRequest $request, FeedbackServices $feedbackServices)
    {
        $feedback = $feedbackServices->create($request->toDTO());

        return response()->json($feedback);
    }
}
