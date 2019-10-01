@extends('home')

@section('content')

<div class="app-title">

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Duração</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th class=" col-4">{{$curso->nome}}</th>
      <td class=" col-2">R$ {{$curso->valor}}</td>
      <td class=" col-3">{{$curso->duracao}}</td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/curso/editar/{{$curso->id}}"> Alterar</a></td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/curso/delete/{{$curso->id}}">Excluir</a> </td>
      <td class="btn btn-outline-success"><a href="javascript:history.go(-1)">Voltar</a></td>
    </tr>
  </tbody>
</table>  

@endsection

