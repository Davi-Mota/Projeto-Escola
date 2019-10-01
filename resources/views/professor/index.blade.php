@extends('home')

@section('content')

<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Professores Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
        <th scope="col">Nº</th>
        <th scope="col">Professor</th>
        <th scope="col">Alterar Dados</th>
        <th scope="col">Excluir Professor</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($professores as $professor)
        <tr class="table-success">
          <th>{{$cont}}</th>
          <td><a href="http://projeto1.test/professor/{{$professor->id}}">{{$professor->nome}}</a></td>
      <td> <a href="http://projeto1.test/professor/editar/{{$professor->id}}"> Alterar</a></td>
      <td> <a href="http://projeto1.test/professor/delete/{{$professor->id}}"> Excluir</a></td>
        </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
