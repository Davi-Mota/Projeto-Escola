@extends('home')

@section('content')


<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Notas dos Alunos</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Aluno</th>
          <th scope="col">Nota</th>
          <th scope="col">Referência</th>
          <th scope="col">Alterar ⠀ ou ⠀ Excluir Nota</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($notas as $nota)
      <tr class="table-success">
        <th>{{$cont}}</th>
        <td> <a href="http://projeto1.test/nota/{{$nota->idMatDisciplina}}">{{$nota->nomeAluno}}</a></td>
        <td>{{$nota->valor}}</td>
        <td>{{$nota->referencia}}</td>
        <td class="btn btn-outline-success col-5"> <a href="http://projeto1.test/nota/editar/{{$nota->id}}"> Alterar</a></td>
        <td class="btn btn-outline-success col-5"> <a href="http://projeto1.test/nota/delete/{{$nota->id}}"> Excluir</a></td>
      </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection
