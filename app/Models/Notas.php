<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $fillable = [
        'idMatDisciplina',
        'valor',
        'referencia'
    ];

    public static function store($notas){

        $nota = new Notas;

        $nota->idMatDisciplina = $notas['idMatDisciplina'];
        $nota->valor = $notas['valor'];
        $nota->referencia = $notas['referencia'];
        $nota->save();
    }
}
