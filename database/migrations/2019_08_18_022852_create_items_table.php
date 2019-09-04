<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
  
            $table->increments('id');
            $table->integer('lists_id')->unsigned();
            $table->string('nome');
            $table->integer('qtde');
            $table->string('onde_encontrar');
            //$table->string('url_foto');
            $table->foreign('lists_id')->references('id')->on('lists')->onDelete('cascade');

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
        Schema::dropIfExists('items');
    }
}
