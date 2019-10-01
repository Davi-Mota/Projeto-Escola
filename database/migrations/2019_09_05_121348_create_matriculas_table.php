<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idCurso')->unsigned();
            $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('cascade');
            $table->bigInteger('idAluno')->unsigned();
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->string('semestre', 15);
            $table->decimal('valor', 8,2)->default(0)->nullable();
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
        Schema::dropIfExists('matriculas');
    }
}
