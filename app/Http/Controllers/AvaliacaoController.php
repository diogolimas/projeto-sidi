<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
    public function index($id)
    {
        $avaliacoes = Avaliacao::where('id_turma', $id)->get();
        return view('site.avaliacao.index', compact('avaliacoes', 'id'));
    }

    public function create($id)
    {
        //return view('site.avaliacao.create')
    }

    public function store(Request $request)
    {
        //
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
