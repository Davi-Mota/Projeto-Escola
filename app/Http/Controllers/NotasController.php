<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\Alunos;
use App\Models\Matricula;
use App\Models\MatDisciplinas;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Notas::all();

        $matDisciplinas = MatDisciplinas::all();

        $alunos = Alunos::all();

        $matriculas = Matricula::all();

        foreach ($notas as $nota) {
            foreach ($matDisciplinas as $matDisciplina) {
                if ($nota['idMatDisciplina'] == $matDisciplina['id']) {
                    $nota['idMatricula'] = $matDisciplina['idMatricula'];
                }
            }

            foreach ($matriculas as $matricula) {
                if ($nota['idMatricula'] == $matricula['id']) {
                    $nota['idAluno'] = $matricula['idAluno'];
                }
            }
        
            foreach ($alunos as $aluno) {
                if ($nota['idAluno'] == $aluno['id']) {
                    $nota['nomeAluno'] = $aluno['nome'];
                }
            }
        }

        return view('nota.index', array('notas' => $notas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $matDisciplina = MatDisciplinas::find($id);

        $aluno = Alunos::find($id);

        return view('nota.store',  array('matDisciplina' => $matDisciplina));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas = $request->except('_token');
        $notas = Notas::store($notas);
        return redirect()->action('NotasController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matDisciplinas = MatDisciplinas::find($id);
        
        $nota = Notas::all()->where('idMatDisciplina', '=', $id)->sortByDesc('created');
        
        return view('nota.show', array('notas'=>$nota, 'matDisciplinas' => $matDisciplinas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Notas::find($id);

        return view('nota.update', array('nota' => $nota));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $notas = $request->except('_token');
        $id = $notas['id'];

        $nota = Notas::find($id);
        $id = $nota['idMatDisciplina'];

        $nota->idMatDisciplina = $notas['idMatDisciplina'];
        $nota->valor = $notas['valor'];
        $nota->referencia = $notas['referencia'];
        $nota->save();

        return redirect()->action('NotasController@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Notas::find($id)->delete();

        return redirect()->action('NotasController@index');
    }
}
