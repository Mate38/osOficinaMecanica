<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceServiceOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_service_order_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // FK
            $table->unsignedInteger('peca_id');
            $table->unsignedInteger('servico_ordem_id');
            $table->foreign('peca_id')->references('id')->on('pieces');
            $table->foreign('servico_ordem_id')->references('id')->on('service_order_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piece_service_order_services');
    }
}
