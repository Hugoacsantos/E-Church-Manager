<?php

namespace App\DTO;

class FamilyDTO
{
    public string $name;
    public string $status;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->status = $data['status'] ?? 'Ativo';
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'status' => $this->status
        ];
    }
}
