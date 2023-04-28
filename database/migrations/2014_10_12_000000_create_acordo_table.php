<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Acordo', function (Blueprint $table) {
            $table->id();
            $table->string('idExterno',50)->nullable();
            $table->string('cliente',50)->nullable();
            $table->bigInteger('cobrador')->nullable();
            $table->string('tipo',50)->nullable();
            $table->bigInteger('numeroAcordo')->nullable();
            $table->integer('numeroParcelas')->nullable();
            $table->date('dataOperacao')->nullable();
            $table->date('dataEmissao')->nullable();
            $table->date('dataProcessamento')->nullable();
            $table->dateTime('dataHoraInclusao')->nullable();
            $table->dateTime('dataHoraModificacao')->nullable();
            $table->date('dataVencimento')->nullable();
            $table->string('situacao',50)->nullable();
            $table->float('taxaOperacao', 18,2)->nullable();
            $table->float('taxaCet', 18,2)->nullable();
            $table->float('valorPagoTributo', 18,2)->nullable();
            $table->float('valorPrincipal', 18,2)->nullable();
            $table->float('valorJuros', 18,2)->nullable();
            $table->float('valorTarifa', 18,2)->nullable();
            $table->float('valorTributo', 18,2)->nullable();
            $table->float('valorAdicionado', 18,2)->nullable();
            $table->float('valorTotal', 18,2)->nullable();
            $table->float('saldoPrincipal', 18,2)->nullable();
            $table->float('saldoTotal', 18,2)->nullable();
            $table->float('saldoAtual', 18,2)->nullable();
            $table->integer('diasAtraso')->nullable();
            $table->string('linkPagamento',50)->nullable();
            $table->bigInteger('ContratoID')->nullable();
            $table->bigInteger('MotivoCancelamentoID')->nullable();
            $table->bigInteger('NegociacaoID')->nullable();
            $table->string('criterioTributo',50)->nullable();
            $table->bigInteger('produtoID')->nullable();
            $table->bigInteger('tributoID')->nullable();
            $table->bigInteger('meioPagamentoID')->nullable();
            $table->bigInteger('usuarioID')->nullable();
            $table->bigInteger('usuarioCanceladorID')->nullable();
            $table->bigInteger('assessoriaID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Acordo');
    }
};
