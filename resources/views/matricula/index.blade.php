@extends('home')

@section('content')

<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Matrículas Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Matrículas dos Alunos</th>
          <th scope="col">Excluir Matrículas</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($matriculas as $matricula)
      <tr class="table-success">
        <th>{{$cont}}</th>
        <td><a href="http://projeto1.test/matricula/{{$matricula->id}}">{{$matricula->nomeAluno}}</a></td>
        <td class="btn btn-outline-success col-6"> <a href="http://projeto1.test/matricula/delete/{{$matricula->id}}"> Excluir</a></td>
      </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
