<?php

namespace App\Trait;

trait ValidatorUserFormTrait
{
    public function validatorUserForm($data)
    {
        return  validator($data, [
            'name' => 'required|min:5',
            'email' => 'required|min:6',
            'password' => 'required',
        ], [
            "name.required" => "Nome é obrigatório.",
            "name.min" => "Nome deve conter pelo menos 5 caracteres.",
            "password.required" => "Senha é obrigatória.",
            "email.required" => "Email é obrigagotório.",
            "email.min" => "Email deve conter pelo menos 6 caracteres."
        ]);
    }
}
