<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno_indicador extends Model
{
    protected $fillable = [
        'nota_indicador', 'id_aluno', 'id_indicador'
    ];

    public $timestamps = false;
}
