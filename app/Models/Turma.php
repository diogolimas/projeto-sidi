<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{

    protected $fillable = [
        'disciplina', 'codigo', 'professor_id'
    ];
}
