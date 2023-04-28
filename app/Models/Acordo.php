<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acordo extends Model{
    protected $table = 'Acordo';
    public $incrementing = false;
	protected $fillable = [
        'id',
        'idExterno',
        'cliente',
        'cobrador',
        'tipo',
        'numeroAcordo',
        'numeroParcelas',
        'dataOperacao',
        'dataEmissao',
        'dataProcessamento',
        'dataHoraInclusao',
        'dataHoraModificacao',
        'dataVencimento',
        'situacao',
        'taxaOperacao',
        'taxaCet',
        'valorPagoTributo',
        'valorPrincipal',
        'valorJuros',
        'valorTarifa',
        'valorTributo',
        'valorAdicionado',
        'valorTotal',
        'saldoPrincipal',
        'saldoTotal',
        'saldoAtual',
        'diasAtraso',
        'linkPagamento',
        'ContratoID',
        'MotivoCancelamentoID',
        'NegociacaoID',
        'criterioTributo',
        'produtoID',
        'tributoID',
        'meioPagamentoID',
        'usuarioID',
        'usuarioCanceladorID',
        'assessoriaID',
    ];
}
