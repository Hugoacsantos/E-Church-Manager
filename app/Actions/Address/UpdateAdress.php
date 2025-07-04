<?php

declare(strict_types=1);


namespace App\Actions\Address;

use App\DTO\AddressDTO;
use App\Models\Address;
use Exception;

readonly class UpdateAdress {

    public function execute(int $id, AddressDTO $addressDTO) : true {
        $address = Address::find($id);
        if (blank($address)) {
            throw new Exception('Endereço nao encontrado');
        }
        $address->user_id = $addressDTO->userId;
        $address->rua = $addressDTO->rua;
        $address->numero = $addressDTO->numero;
        $address->complemento = $addressDTO->complemento;
        $address->bairro = $addressDTO->bairro;
        $address->cidade = $addressDTO->cidade;

        return $address->save();
    }
}
