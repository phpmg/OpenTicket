<?php

namespace App\Http\Controllers\Users;

use _HumbugBox1bcd60ea4a04\Symfony\Component\Config\Definition\Exception\Exception;
use App\Trait\ValidatorUserFormTrait;
use Symfony\Component\HttpFoundation\Request;
use App\Services\UserService;

class UserController
{
    use ValidatorUserFormTrait;

    /**
     * @OA\Get(
     *   path="/api/users/auth",
     *   summary="Autentica o usuário",
     *    @OA\Parameter(
     *       description="Seu Email",
     *       in="query",
     *       name="email",
     *       required=true,
     *       example="seuemail@dominio.com",
     *       @OA\Schema(
     *         type="string"
     *       )
     *   ),
     *   @OA\Parameter(
     *       description="Sua senha",
     *       in="query",
     *       name="password",
     *       required=true,
     *       example="123456",
     *       @OA\Schema(
     *         type="string"
     *       )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Usuário autenticado com sucesso!"
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="Usuário ou senha inválidos!"
     *   )
     * )
     */
    public function auth(Request $request): array
    {
        $userService = new UserService($request->toArray());
        return $userService->authenticateUser();
    }

    /**
     * @OA\Post(
     *   path="/api/users/sign-on",
     *   summary="Cadastro de usuário",
     *    @OA\Parameter(
     *       description="Seu Nome",
     *       in="query",
     *       name="name",
     *       required=true,
     *       example="Fulano de tal",
     *       @OA\Schema(
     *         type="string"
     *       )
     *   ),
     *   @OA\Parameter(
     *       description="Seu email",
     *       in="query",
     *       name="email",
     *       required=true,
     *       example="seuemail@seudominio.com",
     *       @OA\Schema(
     *         type="string"
     *       )
     *   ),
     *   @OA\Parameter(
     *       description="Sua senha",
     *       in="query",
     *       name="password",
     *       required=true,
     *       example="123456",
     *       @OA\Schema(
     *         type="string"
     *       )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Usuário acadastrado com sucesso!"
     *   ),
     *   @OA\Response(
     *     response="400",
     *     description="Houve um problema ao criar o usuário."
     *   )
     * )
     */
    public function signOn(Request $request)
    {
        $validate = $this->validatorUserForm($request->toArray());

        if ($validate->fails()) {
            return $validate->errors();
        }

        $userService = new UserService($request->toArray());
        $saved = $userService->signOn();

        if (!$saved) {
            abort("400");
        }

        return [
           "success" =>  "Usuário cadastrado com sucesso!"
        ];
    }
}
