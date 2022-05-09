<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Types\BaseResponse;

class UserController extends Controller
{
    private $userRequiredFields = [
        'name',
        'email',
        'password',
    ];

    public function create(Request $request)
    {
        foreach ($this->userRequiredFields as $key) {
            if (!$request->get($key)) {
                return response()->json(new BaseResponse(['field' => $key, $request->all()], false, 'Campos requeridos'));
            }
        }
        return response()->json('Usuário criado com sucesso!');
    }
}
