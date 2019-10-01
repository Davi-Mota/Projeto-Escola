<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatDisciplinas extends Model
{
    protected $fillable = [
        'idMatricula',
        'idDisciplina',
        'idProfessor'
    ];

    public static function store($matDisciplinas){

        $matDisciplina = new MatDisciplinas;

        $matDisciplina->idMatricula = $matDisciplinas['idMatricula'];
        $matDisciplina->idDisciplina = $matDisciplinas['idDisciplina'];
        $matDisciplina->idProfessor = $matDisciplinas['idProfessor'];
        $matDisciplina->save();
    }
}
