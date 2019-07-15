<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Indicador;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $form = [
            'id_avaliacao' => $avaliacao,
            'descricao_indicador' => $request->input('descricao_indicador'),
            'nota_maxima'         => $request->input('nota_maxima'),
        ];

        Indicador::create($form);

        $id = Avaliacao::find($avaliacao)->id_turma;
        return redirect(route('turma/avaliacoes', ['turma' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
