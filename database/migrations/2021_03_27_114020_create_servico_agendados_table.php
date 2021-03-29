<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicoAgendadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servico_agendados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_agendamento');
            $table->unsignedBigInteger('id_manut_tipo');                        
            $table->timestamps();
        });

        Schema::table('servico_agendados', function($table) {
            $table->foreign('id_agendamento')->references('id')->on('agendamentos')->onDelete('cascade');
        });   

        Schema::table('servico_agendados', function($table) {
            $table->foreign('id_manut_tipo')->references('id')->on('manutencao_tipos')->onDelete('cascade');
        });
               
    }// up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servico_agendados');
    }
}
