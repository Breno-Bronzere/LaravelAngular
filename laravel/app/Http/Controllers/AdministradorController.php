<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    function add(Request $dados)
    {
        $dados->validate([
            'nome'     => 'required|min:3',
            'email'    => 'required|email',
            'telefone' => 'required|size:11',
            'cpf'      => 'required|size:11',
            'usuario'  => 'required|min:3',
            'senha'    => 'required|min:6',
            'status'   => 'required',
        ]);

        $admin = new \App\Models\AdministradorModel();
        $admin::create($dados->all());

        return response()->json($admin->all(), 200);
    }

    function remove(string $id)
    {
        $admin = new \App\Models\AdministradorModel();
        $admin::destroy($id);

        return response()->json($admin->all(), 200);
    }
}
