<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        
    public function up() {

        Schema::create('professores', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->integer('siape');
            $table->unsignedBigInteger('eixo_id');
            $table->foreign('eixo_id')->references('id')->on('eixos');
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('professores');
    }
};
