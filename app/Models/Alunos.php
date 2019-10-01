<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    
    protected $fillable = [
        'nome',
        'nMatricula'
    ];

    public static function store($alunos){

        $aluno = new Alunos;

        $aluno->nome = $alunos['nome'];
        $aluno->nMatricula = $alunos['nMatricula'];
        $aluno->save();
    }

}
