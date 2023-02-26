<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;

class UserService
{
    private UserDTO $userDTO;

    public function __construct(array $data)
    {
        $this->userDTO = new UserDTO(
            data_get($data, "name", ""),
            data_get($data, "email", ""),
            data_get($data, "password", "")
        );
    }

    public function signOn(): bool
    {
        $user = new User();

        $user->name = $this->userDTO->name;
        $user->email = $this->userDTO->email;
        $user->password = $this->userDTO->password;

        return $user->save();
    }

    public function authenticateUser(): array
    {
        $user = User::where('email', $this->userDTO->email)->first();
        if (!$this->userDTO->checkPass(data_get($user, "password", ""))) {
            abort("404");
        }

        return $this->userDTO->userAuthenticated($user);
    }
}
