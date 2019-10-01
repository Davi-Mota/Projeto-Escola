<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Cursos;
use App\Models\Professores;
use App\Models\Alunos;
use App\Models\Disciplinas;
use App\Models\MatDisciplinas;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::all()->sortByDesc("created_at");

        $cursos = Cursos::all()->sortByDesc("nome");

        foreach ($matriculas as $matricula) {
            foreach ($cursos as $curso) {
                if ($matricula['idCurso'] == $curso['id']) {
                    $matricula['nomeCurso'] = $curso['nome'];
                }
            }
        }

        $alunos = Alunos::all()->sortBy("nome");

        foreach ($matriculas as $matricula) {
            foreach ($alunos as $aluno) {
                if ($matricula['idAluno'] == $aluno['id']) {
                    $matricula['nomeAluno'] = $aluno['nome'];
                }
            }
        }

        return view('matricula.index', array('matriculas' => $matriculas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cursos = Cursos::all()->sortBy("nome");
        $aluno = Alunos::find($id);

        return view('matricula.store', array('cursos' => $cursos, 'aluno' => $aluno));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matriculas = $request->except('_token');
        $cursos = Cursos::find($matriculas['idCurso']);
        $curso = $cursos['valor'];
        $matriculas['valor'] = $curso;

        $matriculas = Matricula::store($matriculas);

        return redirect()->action('MatriculaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::find($id);

        $alunos = Alunos::find($matricula['idAluno']);
        $aluno = $alunos['nome'];
        $matricula['nomeAluno'] = $aluno;

        $cursos = Cursos::find($matricula['idCurso']);
        $matricula['nomeCurso'] = $cursos['nome'] ;

        return view('matricula.show', array('matricula'=>$matricula)); 

       /* $matDisciplinas = MatDisciplinas::all()->where('idMatricula', '=', $id)->sortByDesc("created_at");

        $disciplinas = Disciplinas::all();

        $professores = Professores::all();

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($disciplinas as $disciplina) {
                if ($matDisciplina['idDisciplina'] == $disciplina['id']) {
                    $matDisciplina['nomeDisciplina'] = $disciplina['nome'];
                }
            }
        }

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($professores as $professor) {
                if ($matDisciplina['idProfessor'] == $professor['id']) {
                    $matDisciplina['nomeProfessor'] = $professor['nome'];
                }
            }
        }  */
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id);

        return view('matricula.update', array('matricula' => $matricula));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $matriculas = $request->except('_token');
        $id = $matriculas['id'];

        $matricula = Matricula::find($id);

        $matricula->idCurso = $matricula['idCurso'];
        $matricula->idAluno = $matricula['idAluno'];
        $matricula->semestre = $matricula['semestre'];
        $matricula->valor = $matricula['valor'];
        $matricula->save();

        return redirect()->action('MatriculaController@show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id)->delete();

        return redirect()->action('MatriculaController@index');
    }
}
