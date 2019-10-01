@extends('home')

@section('content')

<div class="app-title">
 
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Curso</th>
      <th scope="col">Semestre</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th class=" col-3">{{$matricula->nomeAluno}}</th>
      <td class=" col-3">{{$matricula->nomeCurso}}</td>
      <td class=" col-1">{{$matricula->semestre}}</td>
      <td class=" col-2">{{$matricula->valor}}</td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/matricula/delete/{{$matricula->id}}">Excluir</a> </td>
      <td class="btn btn-outline-success col-7"><a href="http://projeto1.test/matDisciplina/cadastro/{{$matricula->id}}">Adicionar Disciplina</a></td>
    </tr>
  </tbody>
</table> 

@endsection
