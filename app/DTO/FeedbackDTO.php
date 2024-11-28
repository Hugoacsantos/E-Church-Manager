<?php

namespace App\DTO;

use DateTime;

class FeedbackDTO
{
    public string $user;
    public string $titulo;
    public string $texto;
    public DateTime $data;
    public string $tipoDeFeedback;

    public function __construct(array $data)
    {
        $this->user = $data['user'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
        $this->texto = $data['texto'];
        $this->data = new DateTime($data['data'] ?? 'now');
        $this->tipoDeFeedback = $data['tipo_de_feedback'];
    }

    public function toArray() {
        return [
            'user' => $this->user,
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'data' => $this->data,
            'tipo_de_feedback' => $this->tipoDeFeedback,
        ];
    }

}


