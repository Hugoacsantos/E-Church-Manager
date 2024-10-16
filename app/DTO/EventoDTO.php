<?php

namespace App\DTO;

use DateTime;

class EventoDTO
{
    public string $titulo;
    public string $descricao;
    public string $local;
    public DateTime $data;
    public string $status;

    public function __construct(array $data)
    {
        $this->titulo = $data['titulo'] ?? '';
        $this->descricao = $data['descricao'] ?? '';
        $this->local = $data['local'] ?? '';
        $this->data = isset($data['data']) ? new DateTime($data['data']) : new DateTime(); 
        $this->status = $data['status'] ?? 'ativo'; 
    }

    public function toArray(): array
    {
        return [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'local' => $this->local,
            'data' => $this->data->format('Y-m-d H:i:s'),
            'status' => $this->status,
        ];
    }
}
