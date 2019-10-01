@extends('home')

@section('content')

<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro de Curso</h1>
          <form method="post" action="/curso/cadastrado">
            <div class="form-group col-8">
              {!! csrf_field() !!}
              <label for="exampleInputNome">Nome do Curso</label>
              <input maxlength="50" type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Curso" required>
            </div>
            <div class="form-group col-8">
              <label for="exampleInputNuMatricula">Duração do Curso</label>
              <input  maxlength="15" type="text" name="duracao" class="form-control" id="exampleInputNuMatricula" placeholder="Duração Curso" required>
            </div>
            <div class="form-group col-8">
              <label for="exampleInputNuMatricula">Valor do Curso</label>
              <input min="0" max="99999999999" type="number" name="valor" class="form-control" id="exampleInputNuMatricula" placeholder="Valor Curso" required>
            </div>
            <div class="from-group col-8">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
