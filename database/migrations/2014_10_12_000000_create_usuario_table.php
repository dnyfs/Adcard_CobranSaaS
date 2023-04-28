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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50)->nullable();
            $table->string('idExterno',50)->nullable();
            $table->string('codigo',50)->nullable();
            $table->string('cpf',14)->nullable();
            $table->string('situacao',20)->nullable();
            $table->string('email',250)->nullable();
            $table->bigInteger('perfil')->nullable();
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
        Schema::dropIfExists('Usuario');
    }
};
