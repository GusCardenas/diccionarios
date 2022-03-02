<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionariesTable extends Migration
{
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->string('nombre')->unique();
            $table->string('ruta');
            $table->string('notas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
