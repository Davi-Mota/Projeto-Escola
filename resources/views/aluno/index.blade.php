@extends('home')

@section('content')

<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Alunos Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Aluno</th>
          <th scope="col">Alterar Dados</th>
          <th scope="col">Excluir Aluno</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($alunos as $aluno)
        <tr class="table-success">
          <th>{{$cont}}</th>
          <td><a href="http://projeto1.test/aluno/{{$aluno->id}}">{{$aluno->nome}}</a></td>
          <td><a href="http://projeto1.test/aluno/editar/{{$aluno->id}}" type="submit">Alterar</a></td>
          <td><a href="http://projeto1.test/aluno/delete/{{$aluno->id}}" type="submit">Excluir </a></td>
        </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

