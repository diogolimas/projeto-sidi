<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Permissao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cadastrar_usuario', 'cadastrar_avaliacao', 'cadastrar_indicador', 'edit_delete_usuario', 'edit_delete_avaliacao', 'edit_delete_indicador',
    ];
}