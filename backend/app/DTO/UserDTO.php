<?php

namespace App\DTO;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DateTime;

class UserDTO
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public int $userId = 0;
    public string $token = '';
    private string $unHashedPass = '';
    private Hash $hash;
    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->hash = new Hash();
        $this->name = $name;
        $this->email = $email;
        $this->password = $this->hash->make($password);
        $this->unHashedPass = $password;
    }

    public function checkPass(string $pass): bool
    {
        return $this->hash->check($this->unHashedPass, $pass);
    }

    public function userAuthenticated(User $userData): array
    {
        $dateTime = new DateTime("now");
        $this->name = data_get($userData, "name", "");
        $this->userId = data_get($userData, "id", "");
        $hashedCode = $this->hash->make($dateTime->getTimestamp() + $this->userId);
        $personalToken = $userData->createToken($hashedCode)->accessToken;
        $this->token = $personalToken->token;

        return [
            "name" => $this->name,
            "email" => $this->email,
            "token" => $this->token
        ];
    }
}
