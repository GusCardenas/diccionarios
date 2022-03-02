<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionariesValuesTable extends Migration
{
    public function up()
    {
        Schema::create('dictionaries_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('texto_inicial')->nullable();
            $table->string('text_final')->nullable();
            $table->integer('valor_inicial')->nullable();
            $table->integer('valor_final')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
