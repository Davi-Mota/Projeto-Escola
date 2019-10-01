@extends('home')

@section('content')

<div class="app-title">

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-sm">
      <div class="card" style="width: 32rem;">
        <div class="card-body">
          <h5 class="card-title">Atualização de Curso</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>

          <form method="post" action="/curso/cadastrado">
            <div class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$curso->id}}">
              <label for="exampleInputNome">Nome do Curso</label>
              <input maxlength="50" type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Curso" required>
            </div>
            <div class="form-group">
              <label for="exampleInputNuMatricula">Duração do Curso</label>
              <input  maxlength="15" type="text" name="duracao" class="form-control" id="exampleInputNuMatricula" placeholder="Duração Curso" required>
            </div>
            <div class="form-group">
              <label for="exampleInputNuMatricula">Valor do Curso</label>
              <input min="0" max="99999999999" type="number" name="valor" class="form-control" id="exampleInputNuMatricula" placeholder="Valor Curso" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>

          </div>
        </div>
    </div>
  </div>
</div>

@endsection

