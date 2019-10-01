<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::all();
        
        return view('curso.index', array('cursos' => $cursos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos = $request->except('_token');
        $cursos = Cursos::store($cursos);

        #$curso = $cursos['id']->sortByDesc("created_at")->

        #$id = $curso;

        return redirect()->action('CursosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Cursos::find($id);
        return view('curso.show', array('curso'=>$curso));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Cursos::find($id);

        return view('curso.update', array('curso' => $curso));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cursos = $request->except('_token');
        $id = $cursos['id'];

        $curso = Cursos::find($id);

        $curso->nome = $cursos['nome'];
        $curso->valor = $cursos['valor'];
        $curso->duracao = $cursos['duracao'];
        $curso->save();

        return redirect()->action('CursosCrontroller@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Cursos::find($id)->delete();

        return redirect()->action('CursosController@index');
    }
}
