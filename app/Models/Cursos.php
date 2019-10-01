<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'duracao'
    ];

    public static function store($cursos){

        $curso = new Cursos;

        $curso->nome = $cursos['nome'];
        $curso->valor = $cursos['valor'];
        $curso->duracao = $cursos['duracao'];
        $curso->save();
    }
}
