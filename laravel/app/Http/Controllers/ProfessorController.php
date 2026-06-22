<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function add(Request $dados)
    {
        $dados->validate([
            'nome'     => 'required|min:3',
            'email'    => 'required|email',
            'telefone' => 'required|min:8',
        ]);

        $professor = new \App\Models\ProfessorModel();
        $professor::create($dados->all());

        return response()->json($professor->all(), 200);
    }

    function remove(string $id)
    {
        $professor = new \App\Models\ProfessorModel();
        $professor::destroy($id);

        return response()->json($professor->all(), 200);
    }
}
