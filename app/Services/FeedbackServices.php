<?php

namespace App\Services;

use App\DTO\FeedbackDTO;
use App\Models\FeedBack;
use App\Models\FeedBackType;
use Illuminate\Support\Facades\DB;

class FeedbackServices
{
    public function create(FeedbackDTO $feedbackDTO): array {
        return DB::transaction(function () use ($feedbackDTO) {

            $feedback = new FeedBack();
            $feedback->titulo = $feedbackDTO->titulo ?? 'Sem titulo';
            $feedback->texto = $feedbackDTO->texto;
            $feedback->data = $feedbackDTO->data;
            $feedback->save();


            $feedbackType = new FeedBackType();
            $feedbackType->tipo_de_feedback = $feedbackDTO->tipoDeFeedback;
            $feedbackType->feedback_id = $feedback->id;
            $feedbackType->feito_por = $feedbackDTO->user;
            $feedbackType->save();


            return [
                'feedback' => $feedback,
                'feedbackType' => $feedbackType,
            ];
        });
    }
}
