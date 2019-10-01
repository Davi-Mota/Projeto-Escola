<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'idCurso'
    ];

    public static function store($disciplinas){

        $disciplina = new Disciplinas;

        $disciplina->nome = $disciplinas['nome'];
        $disciplina->valor = $disciplinas['valor'];
        $disciplina->idCurso = $disciplinas['idCurso'];
        $disciplina->save();
    }
}
