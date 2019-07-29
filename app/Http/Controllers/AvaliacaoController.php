<?php

namespace App\Http\Controllers;

use App\Models\Aluno_turma;
use App\Models\Indicador;
use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Turma;
use App\User;
use App\Models\Aluno_avaliacao;
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

            $alunos = DB::table('users')
                ->join('aluno_turmas', 'users.id', '=', 'aluno_turmas.id_user')
                ->where('id_turma', $avaliacao->id_turma)
                ->select('*')
                ->get();

            foreach ($alunos as $aluno){
                Aluno_avaliacao::insert([
                    'id_aluno'      => $aluno->id_user,
                    'id_avaliacao'  => $avaliacao->id,
                ]);
            }

            foreach ($alunos as $aluno){
                $media = Aluno_avaliacao::where('id_aluno', $aluno->id_user)->avg('nota_avaliacao');
                Aluno_turma::where('id_user', $aluno->id_user)->update(['nota_turma' => $media]);
            }

            return redirect('avaliacoes/' . $request->input('id') );
        }
    }

    public function show($id)
    {
        $avaliacao = Avaliacao::find($id);
        $indicadores1 = Indicador::where('id_avaliacao', $id)->get();
        $indicadores = DB::table('users')
            ->join('aluno_indicadors', 'users.id', '=', 'aluno_indicadors.id_aluno')
            ->join('indicadors', 'aluno_indicadors.id_indicador', '=', 'indicadors.id')
            ->where('id_avaliacao', $id)
            ->select('*')
            ->orderBy('users.id')
            ->orderBy('aluno_indicadors.id_indicador')
            ->get();

        $nota_avaliacao = Aluno_avaliacao::where('id_avaliacao', $id)->get();

        $alunos = DB::table('users')
            ->join('aluno_turmas', 'users.id', '=', 'aluno_turmas.id_user')
            ->where('id_turma', $avaliacao->id_turma)
            ->select('*')
            ->get();

        return view('site.avaliacao.show', compact('avaliacao', 'indicadores', 'alunos', 'indicadores1', 'nota_avaliacao'));
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
