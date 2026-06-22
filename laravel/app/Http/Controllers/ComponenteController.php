<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    function add(Request $dados)
    {
        $dados->validate([
            'nome'        => 'required|min:3',
            'hora_inicio' => 'required|date',
            'hora_fim'    => 'required|date',
        ]);

        $componente = new \App\Models\ComponenteModel();
        $componente::create($dados->all());

        return response()->json($componente->all(), 200);
    }

    function remove(string $id)
    {
        $componente = new \App\Models\ComponenteModel();
        $componente::destroy($id);

        return response()->json($componente->all(), 200);
    }
}
