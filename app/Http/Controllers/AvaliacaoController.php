<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Turma;

class AvaliacaoController extends Controller
{
    public function index($id)
    {
        $avaliacoes = Avaliacao::where('id_turma', $id)->get();
        return view('site.avaliacao.index', compact('avaliacoes', 'id'));
    }

    public function create($id)
    {
        $turma = Turma::find($id);
        return view('site.avaliacao.create', compact('turma'));
    }

    public function store(Request $request)
    {
        if( empty($request->input('descricao')) || empty($request->input('nomeavaliacao')) ){
            echo 'Preencha corretamente o formulário de cadastro';
        }else{
            $avaliacao = new Avaliacao();

            $avaliacao->nome = $request->input('nomeavaliacao');
            $avaliacao->descricao = $request->input('descricao');
            $avaliacao->id_turma = $request->input('id');
            $avaliacao->save();

            return redirect('avaliacoes/' . $request->input('id') );
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
