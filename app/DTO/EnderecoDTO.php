<?php

namespace App\DTO;

class EnderecoDTO
{
    public string $user_id;
    public string $rua;
    public string $numero;
    public string $complemento;
    public string $bairro;
    public string $cidade;
    public string $estado;

    public function __construct(array $data)
    {
        $this->user_id = $data['user_id'];
        $this->rua = $data['rua'];
        $this->numero = $data['numero'];
        $this->complemento = $data['complemento'];
        $this->bairro = $data['bairro'];
        $this->cidade = $data['cidade'];
        $this->estado = $data['estado'];
    }

    public function toArray(){
        return [
            'user_id' => $this->user_id,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
        ];
    }



}
