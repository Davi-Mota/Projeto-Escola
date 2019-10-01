@extends('home')

@section('content')

<div class="app-title">


<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Curso</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th class=" col-4">{{$disciplina->nome}}</th>
      <td class=" col-3"> R$ {{$disciplina->valor}}</td>
      <td class=" col-2">{{$disciplina->nomeCurso}}</td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/disciplina/editar/{{$disciplina->id}}">Alterar</a> </td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/disciplina/delete/{{$disciplina->id}}">Excluir</a> </td>
      <td class="btn btn-outline-success"><a href="javascript:history.go(-1)">Voltar</a></td>
    </tr>
  </tbody>
</table>

@endsection
