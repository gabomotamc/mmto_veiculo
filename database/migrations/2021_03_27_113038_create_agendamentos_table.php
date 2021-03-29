<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_veiculo');
            $table->date('data_entrega');
            $table->timestamps();
        });

        Schema::table('agendamentos', function($table) {
            $table->foreign('id_veiculo')->references('id')->on('veiculos')->onDelete('cascade');
        });      

    }// up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
