<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{

    protected $fillable = [
        'disciplina',  'professor_id'
    ];
}
