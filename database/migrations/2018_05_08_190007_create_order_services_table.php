<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numero_ordem');
            $table->string('data_abertura', 20);
            $table->string('data_encerramento', 20)->nullable();
            $table->tinyInteger('status');
            $table->text('observacao')->nullable();
            $table->timestamps();
            // FK
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cliente_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_services');
    }
}
