<?php

namespace App\Http\Controllers;

use App\Models\Aluno_turma;
use App\Models\Indicador;
use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Turma;
use App\User;

use App\Http\Controllers\IndicadorController;
use Illuminate\Support\Facades\DB;


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
        $avaliacao = Avaliacao::find($id);
        $indicadores = Indicador::where('id_avaliacao', $id)->get();


        $alunos = DB::table('users')
            ->join('aluno_turmas', 'users.id', '=', 'aluno_turmas.id_user')
            ->where('id_turma', $avaliacao->id_turma)
            ->select('*')
            ->get();

        return view('site.avaliacao.show', compact('avaliacao', 'indicadores', 'alunos'));
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
