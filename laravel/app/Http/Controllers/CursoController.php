<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    function add(Request $dados)
    {
        $dados->validate([
            'nome'    => 'required|min:3',
            'periodo' => 'required|min:1',
        ]);

        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());

        return response()->json($curso->all(), 200);
    }

    function remove(string $id)
    {
        $curso = new \App\Models\CursoModel();
        $curso::destroy($id);

        return response()->json($curso->all(), 200);
    }
}
