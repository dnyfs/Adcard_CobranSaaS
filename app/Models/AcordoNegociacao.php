<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcordoNegociacao extends Model{
    protected $table = 'Acordo_Negociacao';
    public $incrementing = false;
	protected $fillable = [
        'id',
        'acordoID',
        'nome',
        'descricao',
        'situacao',
        'tipo',
        'gestao',
        'cor',
        'icone',
        'tipoDesconto',
        'proposta',
        'modalidadeID',
        'tipoRegistroBoleto'
    ];
}
