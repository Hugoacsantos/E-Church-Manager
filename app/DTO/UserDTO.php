<?php

namespace App\DTO;

class UserDTO
{
    public string $name;
    public string $email;
    public string $password;
    public function __construct(
        array $array
    )
    {
        $this->name = $array['name'];
        $this->email = $array['email'];
        $this->password = $array['password'];
    }

    public function toArray(){
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
