<?php

namespace App\DTO;

class MinistryDTO
{
    public string $titulo;
    public string $descricao;
    public string $status;

    public function __construct(
        array $data
    )
    {
        $this->titulo = $data['titulo'];
        $this->descricao = $data['descricao'];
        $this->status = $data['status'];
    }

    public function toArray() {
        return [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'status' => $this->status
        ];
    }
}
