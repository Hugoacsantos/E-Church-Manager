<?php

namespace App\DTO;

class FamilyDTO
{
    public string $nomefamilia;
    public string $status;

    public function __construct(array $data)
    {
        $this->nomefamilia = $data['familia'];
        $this->status = $data['status'] ?? 'Ativo';
    }

    public function toArray(): array {
        return [
            'nomefamilia' => $this->nomefamilia,
            'status' => $this->status
        ];
    }
}
