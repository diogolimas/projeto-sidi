<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno_avaliacao extends Model
{
    protected $fillable = [
        'nota_avaliacao', 'id_aluno', 'id_avaliacao'
    ];

    public $timestamps = false;
}
