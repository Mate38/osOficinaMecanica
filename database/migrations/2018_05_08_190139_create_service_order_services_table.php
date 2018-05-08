<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observacao', 90)->nullable();
            $table->tinyInteger('status');
            $table->string('horas_atividade', 5)->nullable();
            $table->string('valor_total', 10)->nullable();
            $table->timestamps();
            // FK
            $table->unsignedInteger('servico_id');
            $table->unsignedInteger('ordemservico_id');
            $table->unsignedInteger('funcionario_id');
            $table->unsignedInteger('carro_id');
            $table->foreign('servico_id')->references('id')->on('services');
            $table->foreign('ordemservico_id')->references('id')->on('order_services');
            $table->foreign('funcionario_id')->references('id')->on('employees');
            $table->foreign('carro_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_order_services');
    }
}
