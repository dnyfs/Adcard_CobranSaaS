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
        Schema::create('Modalidade', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50)->nullable();
            $table->string('tipo',50)->nullable();
            $table->string('situacao',50)->nullable();
            $table->string('gestao',50)->nullable();
            $table->string('cor',50)->nullable();
            $table->float('valorDistorcao',18, 2)->nullable();
            $table->float('percentualDistorcao',18, 2)->nullable();
            $table->integer('atrasoMaximo')->nullable();
            $table->integer('atrasoEntrada')->nullable();
            $table->string('acaoOrigemLiquidaca',50)->nullable();
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
        Schema::dropIfExists('Modalidade');
    }
};
