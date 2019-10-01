@extends('home')

@section('content')


<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Disciplinas Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Disciplinas</th>
          <th scope="col">Alterar Dados</th>
          <th scope="col">Excluir Disciplinas</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($disciplinas as $disciplina)
      <tr class="table-success">
        <th>{{$cont}}</th>
        <td><a href="http://projeto1.test/disciplina/{{$disciplina->id}}">{{$disciplina->nome}}</a></td>
        <td><a href="http://projeto1.test/disciplina/editar/{{$disciplina->id}}"> Alterar</a></td>
        <td><a href="http://projeto1.test/disciplina/delete/{{$disciplina->id}}"> Excluir</a></td>
      </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
