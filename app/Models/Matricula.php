<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'idCurso',
        'idAluno',
        'semestre',
        'valor'
    ];

    public static function store($matriculas){

        $matricula = new Matricula;

        $matricula->idCurso = $matriculas['idCurso'];
        $matricula->idAluno = $matriculas['idAluno'];
        $matricula->semestre = $matriculas['semestre'];
        $matricula->valor = $matriculas['valor'];
        $matricula->save();
    }
}
