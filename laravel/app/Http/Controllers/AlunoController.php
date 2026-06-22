<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    function add(Request $dados) { 
        $dados->validate([
	                'nome' => 'required|min:3|max:255',
	            ],
	            [
	                'nome.required' => 'O campo nome é obrigatório.',
	                'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
	                'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
	            ]);
        $aluno = new \App\Models\AlunoModel();
        $aluno::create($dados->all());

        $alunos = new \App\Models\AlunoModel();

        return response()->json($alunos->all(), 200);
    }

    function remove(string $id) {
        $aluno = new \App\Models\AlunoModel();
        // $aluno::reset($id);
        $aluno::destroy($id);

		return response()->json([$aluno->all()], 200);

    }
    function atualizar(Request $dados, string $id) {
        $aluno = new \App\Models\AlunoModel();
        $aluno::where('id', $id)->update($dados->all());

        return response()->json([$aluno->all()], 200);
        
    }
}
