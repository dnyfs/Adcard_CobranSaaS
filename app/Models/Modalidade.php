<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model{
    protected $table = 'Modalidade';
    public $incrementing = false;
	protected $fillable = [
        'id',
        'nome',
        'tipo',
        'situacao',
        'gestao',
        'cor',
        'valorDistorcao',
        'percentualDistorcao',
        'atrasoMaximo',
        'atrasoEntrada',
        'acaoOrigemLiquidaca'
    ];
}
