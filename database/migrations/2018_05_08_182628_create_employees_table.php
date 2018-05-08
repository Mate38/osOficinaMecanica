<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            // Funcionário
            $table->string('cpf', 20)->unique();
            $table->string('nome', 50);
            $table->string('email', 50);
            $table->string('telefone1', 15);
            $table->string('telefone2', 15)->nullable();
            // Dados funcionário
            $table->string('carteira_trabalho', 20)->unique();
            // Endereço
            $table->string('numero', 45);
            $table->string('cep', 9);
            $table->string('complemento', 90)->nullable();
            $table->string('estado', 90);
            $table->string('cidade', 90);
            $table->string('bairro', 90);
            $table->string('logradouro', 90);
            $table->timestamps();
            // FK
            $table->unsignedInteger('especialidade_id');
            $table->foreign('especialidade_id')->references('id')->on('specialties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
