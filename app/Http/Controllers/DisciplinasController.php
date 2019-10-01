<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Disciplinas;
use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplinas::all();

        $cursos = Cursos::all()->sortByDesc("nome");

        foreach ($disciplinas as $disciplina) {
            foreach ($cursos as $curso) {
                if ($disciplina['idCurso'] == $curso['id']) {
                    $disciplina['nomeCurso'] = $curso['nome'];
                }
            }
        }
       
        return view('disciplina.index', array('disciplinas' => $disciplinas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $cursos = Cursos::all();

        return view('disciplina.store', array('cursos' => $cursos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disciplinas = $request->except('_token');
        $disciplinas = Disciplinas::store($disciplinas);
        return redirect()->action('DisciplinasController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = Disciplinas::find($id);

        $cursos = Cursos::find($disciplina['idCurso']);
        $disciplina['nomeCurso'] = $cursos['nome'] ;

        return view('disciplina.show', array('disciplina'=>$disciplina));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = Disciplinas::find($id);

        $curso = Cursos::find($id);

        return view('disciplina.update', array('disciplina' => $disciplina, 'curso' => $curso));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $disciplinas = $request->except('_token');
        $id = $disciplinas['id'];

        $disciplina = Disciplinas::find($id);

        $disciplina->nome = $disciplinas['nome'];
        $disciplina->valor = $disciplinas['valor'];
        $disciplina->idCurso = $disciplinas['idCurso'];
        $disciplina->save();

        return redirect()->action('DisciplinasController@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplina = Disciplinas::find($id)->delete();

        return redirect()->action('DisciplinasController@index');
    }
}
