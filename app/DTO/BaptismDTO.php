<?php

namespace App\DTO;

use DateTime;

class BaptismDTO
{
    public DateTime $data_batismo;
    public string $membro_id;
    public string $batizado_por;
    public string $url_certificado;

    public function __construct(array $data)
    {
        $this->data_batismo = new DateTime($data['data_batismo']);
        $this->membro_id = $data['membro_id'];
        $this->batizado_por = $data['batizado_por'];
        $this->url_certificado = $data['url'] ?? '';
    }

    public function toArray(): array
    {
        return [
            'data_batismo' => $this->data_batismo->format('Y-m-d H:i:s'),
            'membro_id' => $this->membro_id,
            'batizado_por' => $this->batizado_por,
            'url' => $this->url_certificado
        ];
    }
}
