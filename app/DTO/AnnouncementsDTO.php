<?php

namespace App\DTO;

use DateTime;

readonly class AnnouncementsDTO
{
    public string $criado_por;
    public string $titulo;
    public string $aviso;
    public string $status;
    public DateTime $criado_em;

    public function __construct(array $data)
    {
        $this->criado_por = $data['criado_por'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
        $this->aviso = $data['aviso'] ?? '';
        $this->status = $data['status'] ?? '';
        $this->criado_em = new DateTime($data['criado_em'] ?? 'now');
    }

    public function toDTO(): array {
        return [
            'criado_por' => $this->criado_por,
            'titulo' => $this->titulo,
            'aviso' => $this->aviso,
            'status' => $this->status,
            'criado_em' => $this->criado_em->format('Y-m-d H:i:s'),
        ];
    }

}
