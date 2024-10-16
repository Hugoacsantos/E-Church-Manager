<?php

namespace App\Services;

use App\DTO\EnderecoDTO;
use App\Models\Endereco;
use InvalidArgumentException;
use RuntimeException;

class EnderecoServices {

    private int $totalEnderecoPermitido = 2;

    public function create(EnderecoDTO $enderecoDTO): array {
        if(\is_null($enderecoDTO)) throw new InvalidArgumentException('Dados vazios');

        $total = $this->getQuantityEndereco($enderecoDTO->user_id);

        if($total > $this->totalEnderecoPermitido) throw new RuntimeException('Ususario ja possui o total permitido de endereco cadastrado');

        $endereco = Endereco::create($enderecoDTO->toArray());
        
        return $endereco;
    }

    public function update(int $id, array $data): true {
        $endereco = Endereco::find($id);
        if(!$endereco) throw new InvalidArgumentException('Endereço nao encontrado',1);
        $endereco->rua = $data['rua'];
        $endereco->numero = $data['numero'];
        $endereco->compelemento = $data['complemento'];
        $endereco->bairro = $data['bairro'];
        $endereco->cidade = $data['cidade'];
        $endereco->estado = $data['estado'];
        $endereco->save();

        return true;
    }
    
    public function findById(int $id): Endereco{
        $endereco = Endereco::find($id)->get();
        if(!$endereco) throw new InvalidArgumentException('Endereco nao encontrado');
        return $endereco;
    }

    private function getQuantityEndereco(string $user_id) {
        if(empty($user_id)) throw new InvalidArgumentException('Id nao pode ser vazio');
        $total = Endereco::where('user_id',$user_id)->count();

        return $total;
    }

}