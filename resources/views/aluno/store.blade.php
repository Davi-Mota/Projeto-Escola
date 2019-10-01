@extends('home')

@section('content')

<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro de Aluno</h1>
          <form method="post" action="/aluno/cadastrado">
            <div class="form-group col-8">
              {!! csrf_field() !!}
              <label for="exampleInputNome">Nome do Aluno</label>
              <input maxlength="50" type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Aluno" required>
            </div>
            <div class="form-group col-8">
              <label for="exampleInputNuMatricula">Número de Matrícula</label>
              <input min='0' type="number" name="nMatricula" class="form-control" id="exampleInputNuMatricula" placeholder="Número Matrícula" required>
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

