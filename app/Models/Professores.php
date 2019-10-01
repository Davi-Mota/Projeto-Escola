<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    protected $fillable = [
        'nome',
        'formacao'
    ];

    public static function store($professores){

        $professor = new Professores;

        $professor->nome = $professores['nome'];
        $professor->formacao = $professores['formacao'];
        $professor->save();
    }
}
