<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Alunos::all();
        return view('aluno.index', array('alunos'=>$alunos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alunos = $request->except('_token');
        $alunos = Alunos::store($alunos);
        return redirect()->action('AlunosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Alunos::find($id);
        return view('aluno.show', array('aluno'=>$aluno));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Alunos::find($id);

        return view('aluno.update', array('aluno' => $aluno));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $alunos = $request->except('_token');
        $id = $alunos['id'];

        $aluno = Alunos::find($id);

        $aluno->nome = $alunos['nome'];
        $aluno->nMatricula = $alunos['nMatricula'];
        $aluno->save();

        return redirect()->action('AlunosController@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Alunos::find($id)->delete();

        return redirect()->action('AlunosController@index');
    }
}
