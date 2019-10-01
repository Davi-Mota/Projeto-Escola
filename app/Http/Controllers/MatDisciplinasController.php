<?php

namespace App\Http\Controllers;

use App\Models\MatDisciplinas;
use App\Models\Disciplinas;
use App\Models\Cursos;
use App\Models\Alunos;
use App\Models\Matricula;
use App\Models\Professores;
use Illuminate\Http\Request;

class MatDisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matDisciplinas = MatDisciplinas::all();

        $cursos = Cursos::all()->sortByDesc("nome");

        $matriculas = Matricula::all();

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($matriculas as $matricula) {
                if ($matDisciplina['idMatricula'] == $matricula['id']) {
                    $matDisciplina['idCurso'] = $matricula['idCurso'];
                }
            }

            foreach ($cursos as $curso) {
                if ($matDisciplina['idCurso'] == $curso['id']) {
                    $matDisciplina['nomeCurso'] = $curso['nome'];
                }
            }
        }

        $professores = Professores::all()->sortByDesc("nome");

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($professores as $professor) {
                if ($matDisciplina['idProfessor'] == $professor['id']) {
                    $matDisciplina['nomeProfessor'] = $professor['nome'];
                }
            }
        }

        $matriculas = Matricula::all()->sortByDesc("semestre");

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($matriculas as $matricula) {
                if ($matDisciplina['idMatricula'] == $matricula['id']) {
                    $matDisciplina['semestre'] = $matricula['semestre'];
                    $matDisciplina['idAluno'] = $matricula['idAluno']; 
                }
            }
        }

        $alunos = Alunos::all()->sortBy("nome");

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($alunos as $aluno) {
                if ($matDisciplina['idAluno'] == $aluno['id']) {
                    $matDisciplina['nomeAluno'] = $aluno['nome'];
                }
            }
        }
        
        $disciplinas = Disciplinas::all()->sortBy('nome');

        foreach ($matDisciplinas as $matDisciplina) {
            foreach ($disciplinas as $disciplina) {
                if ($matDisciplina['idDisciplina'] == $disciplina['id']) {
                    $matDisciplina['nomeDisciplina'] = $disciplina['nome'];
                }
            }
        }

        return view('matDisciplina.index', array('matDisciplinas' => $matDisciplinas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $matricula = Matricula::find($id);

        $cursos = Cursos::find($matricula['idCurso']);

        $disciplinas = Disciplinas::all()->where('idCurso', '=', $cursos['id'])->sortBy('nome');
        $professores = Professores::all();

        return view('matDisciplina.store', array('disciplinas' => $disciplinas, 'matricula' => $matricula, 'professores' => $professores));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matDisciplinas = $request->except('_token');
        $matDisciplina = MatDisciplinas::store($matDisciplinas);
        return redirect()->action('MatDisciplinasController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatDisciplinas  $matDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matDisciplina = MatDisciplinas::find($id);

        $cursos = Cursos::find($matDisciplina['idCurso']);
        $matDisciplina['nomeCurso'] = $cursos['nome'] ;

        $professores = Professores::find($matDisciplina['idProfessor']);
        $matDisciplina['nomeProfessor'] = $professores['nome'] ;

        $matriculas = Matricula::find($matDisciplina['idMatricula']);
        $matDisciplina['semestre'] = $matriculas['semestre'] ;

        $alunos = Alunos::find($matDisciplina['idAluno']);
        $matDisciplina['nomeAluno'] = $alunos['nome'] ;

        return view('matDisciplina.show', array('matDisciplina'=>$matDisciplina));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatDisciplinas  $matDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function edit(MatDisciplinas $matDisciplinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatDisciplinas  $matDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        #
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatDisciplinas  $matDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matDisciplinas = MatDisciplinas::find($id);
        $matricula = Matricula::find($matDisciplinas['idMatricula']);
        $disciplina = Disciplinas::find($matDisciplinas['idDisciplina']);

        $novoValor = $matricula['valor'] - $disciplina['valor'];
        $matricula->valor = $novoValor;
        $matricula->save();

        $idMatricula = $matricula['id'];

        $matDisciplinas = MatDisciplinas::find($id)->delete();

        return redirect()->action('MatDisciplinasController@index', [$idMatricula]);
    }
}
