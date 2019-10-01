@extends('home')

@section('content')

<div class="app-title">

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Formação</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th class=" col-5">{{$professor->nome}}</th>
      <th class=" col-4">{{$professor->formacao}}</th>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/professor/editar/{{$professor->id}}">Alterar</a> </td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/professor/delete/{{$professor->id}}">Excluir</a> </td>
      <td class="btn btn-outline-success"><a href="javascript:history.go(-1)">Voltar</a></td>
    </tr>
  </tbody>
</table>

@endsection
