<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mat_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idMatricula')->unsigned();
            $table->foreign('idMatricula')->references('id')->on('matriculas')->onDelete('cascade');
            $table->bigInteger('idDisciplina')->unsigned();
            $table->foreign('idDisciplina')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->bigInteger('idProfessor')->unsigned();
            $table->foreign('idProfessor')->references('id')->on('professores')->onDelete('cascade');
            $table->decimal('media', 4,2)->default(0)->nullable();
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
        Schema::dropIfExists('mat_disciplinas');
    }
}
