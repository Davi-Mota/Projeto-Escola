<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professores::all();
        return view('professor.index', array('professores'=>$professores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professores = $request->except('_token');
        $professores = Professores::store($professores);
        return redirect()->action('ProfessoresController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professores::find($id);
        return view('professor.show', array('professor'=>$professor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Professores::find($id);

        return view('professor.update', array('professor' => $professor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $professores = $request->except('_token');
        $id = $professores['id'];

        $professor = Professores::find($id);

        $professor->nome = $professores['nome'];
        $professor->formacao = $professores['formacao'];
        $professor->save();

        return redirect()->action('ProfessoresController@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professores::find($id)->delete();

        return redirect()->action('ProfessoresController@index');
    }
}
