@extends('home')

@section('content')


<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">Lista de Cursos Cadastrados</h1>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
            <th scope="col">Nº</th>
            <th scope="col">Cursos</th>
            <th scope="col">Alterar Dados</th>
            <th scope="col">Excluir Cursos</th>
        </tr>
      </thead>
      <tbody>
      <?php $cont = 1;?>
      @foreach($cursos as $curso)
        <tr class="table-success">
            <th>{{$cont}}</th>
            <td><a href="http://projeto1.test/curso/{{$curso->id}}">{{$curso->nome}}</a></td>
            <td><a href="http://projeto1.test/curso/editar/{{$curso->id}}"> Alterar</a></td>
            <td><a href="http://projeto1.test/curso/delete/{{$curso->id}}"> Excluir</a></td>
        </tr>
      <?php $cont ++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
