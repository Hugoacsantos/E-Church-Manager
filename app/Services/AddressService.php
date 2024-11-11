<?php

namespace App\Services;

use App\DTO\AddressDTO;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class AddressService {

    public const TOTAL_ALLOWED_ADDRESSES = 2;

    public function create(AddressDTO $addressDTO, User $user): Address {
        $total = $this->getAddressCount($user);

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

    public function updateAddress(int $id, AddressDTO $addressDTO): true {
        $address = Address::find($id);
        if(blank($address)) {
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

    public function findById(string $id): Address {
        return Address::find($id);
    }

    public function getAll(): Collection {
        return Address::all();
    }

    private function getAddressCount(User $user): int {
        return $user->address()->count();
    }

}
