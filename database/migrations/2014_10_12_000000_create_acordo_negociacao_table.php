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
        Schema::create('Acordo_Negociacao', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('acordoID')->nullable();
            $table->string('nome',50)->nullable();
            $table->string('descricao',50)->nullable();
            $table->string('situacao',50)->nullable();
            $table->string('tipo',50)->nullable();
            $table->string('gestao',50)->nullable();
            $table->string('cor',50)->nullable();
            $table->string('icone',50)->nullable();
            $table->string('tipoDesconto',50)->nullable();
            $table->integer('proposta')->nullable();
            $table->bigInteger('modalidadeID')->nullable();
            $table->string('tipoRegistroBoleto',50)->nullable();
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
        Schema::dropIfExists('Acordo_Negociacao');
    }
};
