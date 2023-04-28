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
        Schema::create('webhook_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_id');
            $table->string('notification_event');
            $table->string('notification_secret');
            $table->string('notification_content');
            $table->integer('notification_status',false, true)->default(0);
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
        Schema::dropIfExists('webhook_notifications');
    }
};
