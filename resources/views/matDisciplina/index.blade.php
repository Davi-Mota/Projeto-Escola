@extends('home')

@section('content')


<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Matrículas em Disciplinas Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Aluno</th>
          <th scope="col">Disciplina</th>
          <th scope="col">Curso</th>
          <th scope="col"> Professor</th>
          <th scope="col"> Semestre</th>
          <th scope="col"> Média</th>
          <th scope="col">Excluir ⠀ou ⠀ Adicionar Notas ao Aluno</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($matDisciplinas as $matDisciplina)
      <tr class="table-success">
        <th>{{$cont}}</th>
        <td>{{$matDisciplina->nomeAluno}}</td>
        <td>{{$matDisciplina->nomeDisciplina}}</td>
        <td>{{$matDisciplina->nomeCurso}}</td>
        <td>{{$matDisciplina->nomeProfessor}}</td>
        <td>{{$matDisciplina->semestre}}</td>
        <td>{{$matDisciplina->media}}</td>
        <td class="btn btn-outline-success col-4"> <a href="http://projeto1.test/matDisciplina/delete/{{$matDisciplina->id}}" type="submit">Excluir </a></td>
        <td class="btn btn-outline-success col-6"><a href="http://projeto1.test/nota/cadastro/{{$matDisciplina->id}}"> Adicionar </a></td>
      </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

