<?php

namespace App\Http\Controllers;

use App\Models\Aluno_turma;
use App\Models\Avaliacao;
use App\Models\Indicador;
use App\Models\Turma;
use App\Models\Aluno_indicador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno_avaliacao;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($avaliacao)
    {
        $atividade = Avaliacao::find($avaliacao);
        $indicadores = Indicador::where('id_avaliacao', $avaliacao)->get();

        return view('site.avaliacao.indicador.index', compact('atividade', 'indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($avaliacao)
    {
        $atividade = Avaliacao::find($avaliacao);
        $turma = Turma::find($atividade->id_turma);

        return view('site.avaliacao.indicador.create', compact('turma', 'atividade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $avaliacao)
    {
        $id = Avaliacao::find($avaliacao)->id_turma;
        $alunos = Aluno_turma::where('id_turma', $id)->get();

        $form = [
            'id_avaliacao' => $avaliacao,
            'descricao_indicador' => $request->input('descricao_indicador'),
            'nota_maxima'         => $request->input('nota_maxima'),
        ];

        $indicador = Indicador::create($form);

        foreach ($alunos as $aluno) {
            Aluno_indicador::insert([
                'id_aluno'       => $aluno->id_user,
                'id_indicador'   => $indicador->id,
                'nota_indicador' => 0
            ]);
        }

        return redirect(route('turma/verAvaliacao', ['id' => $avaliacao]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $indicador = Indicador::find($request->id);
        $indicador->delete();
        return redirect()->route('', ['succes' => 'Indicador retirado!']);
    }

    public function atribuirNota(Request $request, $avaliacao){
        $atividade = Avaliacao::find($avaliacao);
        $indicadores = Indicador::where('id_avaliacao', $avaliacao)->get();
        $alunos = DB::table('users')
            ->join('aluno_turmas', 'users.id', '=', 'aluno_turmas.id_user')
            ->where('id_turma', $atividade->id_turma)
            ->select('*')
            ->get();

        $contador1 = 0;
        $contador2 = 0;
        foreach ($alunos as $aluno){
            $nota_avaliacao[$contador1] = 0;
            foreach ($indicadores as $indicador){
                $nota_avaliacao[$contador1] += $request->notas[$contador2];
                $contador2 += 1;
            }
            Aluno_avaliacao::where('id_aluno', $aluno->id_user)->where('id_avaliacao', $avaliacao)->update([
                'nota_avaliacao' => $nota_avaliacao[$contador1]
            ]);
            $contador1 += 1;
        }

        $contador = 0;
        foreach ($alunos as $aluno){
            foreach ($indicadores as $indicador){
                Aluno_indicador::where('id_aluno', $aluno->id_user)->where('id_indicador', $indicador->id)->update(['nota_indicador' => $request->notas[$contador]]);
                $contador += 1;
            }
        }

        foreach ($alunos as $aluno){
            $media = Aluno_avaliacao::where('id_aluno', $aluno->id_user)->avg('nota_avaliacao');
            Aluno_turma::where('id_user', $aluno->id_user)->update(['nota_turma' => $media]);
        }

        return redirect(route('turma/verAvaliacao', ['id' => $avaliacao]));
    }
}
