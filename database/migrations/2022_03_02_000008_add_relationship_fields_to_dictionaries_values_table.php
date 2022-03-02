<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDictionariesValuesTable extends Migration
{
    public function up()
    {
        Schema::table('dictionaries_values', function (Blueprint $table) {
            $table->unsignedBigInteger('diccionario_id')->nullable();
            $table->foreign('diccionario_id', 'diccionario_fk_6120949')->references('id')->on('dictionaries');
        });
    }
}
