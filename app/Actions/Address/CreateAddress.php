<?php
declare(strict_types=1);


namespace App\Actions\Address;

use App\DTO\AddressDTO;
use App\Models\Address;
use App\Models\User;
use Exception;

readonly class CreateAddress {
    public const TOTAL_ALLOWED_ADDRESSES = 2;

    public function execute(AddressDTO $addressDTO, User $user): Address {
        
        $total = $user->address()->count();

        if($total > self::TOTAL_ALLOWED_ADDRESSES) {
            throw new Exception('Usuario ja possui o total permitido de endereco cadastrado');
        }


        $address = new Address();
        $address->user_id = $addressDTO->userId;
        $address->rua = $addressDTO->rua;
        $address->numero = $addressDTO->numero;
        $address->complemento = $addressDTO->complemento;
        $address->bairro = $addressDTO->bairro;
        $address->cidade = $addressDTO->cidade;
        $address->save();

        return $address;
    }

}