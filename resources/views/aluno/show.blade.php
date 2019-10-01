@extends('home')

@section('content')

<div class="app-title">
        
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Número de Matrícula</th>
      
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th class=" col-4">{{$aluno->nome}}</th>
      <td class=" col-3">{{$aluno->nMatricula}}</td>
      <td class="btn btn-outline-success col-2"><a href="http://projeto1.test/aluno/editar/{{$aluno->id}}"> Alterar</a></td>
      <td class="btn btn-outline-success col-2"> <a href="http://projeto1.test/aluno/delete/{{$aluno->id}}">Excluir</a> </td>
      <td class="btn btn-outline-success col-4"><a href="http://projeto1.test/matricula/cadastro/{{$aluno->id}}">Matricular Aluno</a></td>
      <td class="btn btn-outline-success col-3"><a href="javascript:history.go(-1)">Voltar</a></td>
    </tr>
  </tbody>
</table>

@endsection


