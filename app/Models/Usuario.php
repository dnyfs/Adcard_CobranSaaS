<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = 'Usuario';
    public $incrementing = false;
	protected $fillable = [
        'id',
        'nome',
        'idExterno',
        'codigo',
        'cpf',
        'situacao',
        'email',
        'perfil',
    ];
}
