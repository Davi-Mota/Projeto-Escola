@extends('home')

@section('content')

<div class="app-title">

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-sm">
      <div class="card" style="width: 32rem;">
        <div class="card-body">
          <h5 class="card-title">Atualização de Aluno</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>

          <form method="post" action="/aluno/editado">
            <div class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$aluno->id}}">   
              <label for="exampleInputNome">Nome do Aluno</label>
              <input maxlength="50" type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Aluno" required>
            </div>
            <div class="form-group">
              <label for="exampleInputNuMatricula">Número de Matrícula</label>
              <input min='0' type="number" name="nMatricula" class="form-control" id="exampleInputNuMatricula" placeholder="Número Matrícula" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection

