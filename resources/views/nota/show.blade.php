@extends('home')

@section('content')

<div class="app-title">
 
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Referencia</th>
      <th scope="col-8">Nota</th>
    </tr>
  </thead>
  <tbody>
  @foreach($notas as $nota)
    <tr class="table-success">
      <td>{{$nota->referencia}}</td>
      <td class="col-3">{{$nota->valor}}</td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/nota/editar/{{$nota->id}}"> Alterar</a></td>
      <td class="btn btn-outline-success"> <a href="http://projeto1.test/nota/delete/{{$nota->id}}">Excluir</a></td>
    </tr>
    @endforeach
    <tr>
      <th>Média:</th>
      <td>{{$matDisciplinas->media}}</td>
    </tr>
  </tbody>
</table> 


@endsection
