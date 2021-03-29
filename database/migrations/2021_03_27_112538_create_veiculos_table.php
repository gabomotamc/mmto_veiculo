<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario'); 
            $table->string('cod_vin',20);
            $table->string('nro_placa',10);
            $table->string('cor',30);
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('versao',30);  
            $table->string('ano',5);                      
            $table->timestamps();
        });

        /*Schema::table('veiculos', function($table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });        

       Schema::table('servicio_cat_sub_relacionals', function($table) {

            $table->foreign('id_cat_trabajo')->references('id')->on('servicio_categoria_trabajos')->onDelete('cascade');

            $table->foreign('id_sub_cat_trabajo')->references('id')->on('servicio_sub_cat_trabajos')->onDelete('cascade');
       });*/          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
