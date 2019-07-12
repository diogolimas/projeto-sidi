<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Aluno_turma extends Model
{
    public $timestamps = false;
    //defino que não desejo trabalhar com timestamps

    protected $fillable =
    [
        'id_turma', 'id_user'
    ];

}
