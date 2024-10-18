<?php

namespace App\Services;

use App\DTO\EnderecoDTO;
use App\Models\Endereco;
use App\Models\User;
use Exception;

class AddressService {

    public const TOTAL_ALLOWED_ADDRESSES = 2;

    public function create(EnderecoDTO $enderecoDTO, User $user): Endereco {
        $total = $this->getAddressCount($user);

        if($total > self::TOTAL_ALLOWED_ADDRESSES) {
            throw new Exception('Ususario ja possui o total permitido de endereco cadastrado');
        }

        $address = new Endereco();
        $address->user_id = $enderecoDTO->userId;
        $address->rua = $enderecoDTO->rua;
        $address->numero = $enderecoDTO->numero;
        $address->complemento = $enderecoDTO->complemento;
        $address->bairro = $enderecoDTO->bairro;
        $address->cidade = $enderecoDTO->cidade;
        $address->save();

        return $address;
    }

    public function updateAddress(int $id, EnderecoDTO $enderecoDTO): true {
        $address = Endereco::find($id);
        if(blank($address)) {
            throw new Exception('Endereço nao encontrado');
        }
        $address->user_id = $enderecoDTO->userId;
        $address->rua = $enderecoDTO->rua;
        $address->numero = $enderecoDTO->numero;
        $address->complemento = $enderecoDTO->complemento;
        $address->bairro = $enderecoDTO->bairro;
        $address->cidade = $enderecoDTO->cidade;

        return $address->save();
    }

    public function findById(int $id): Endereco {
        return Endereco::find($id)->get();
    }

    private function getAddressCount(User $user): int {
        return $user->enderecos()->count();
    }

}
