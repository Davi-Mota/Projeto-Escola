@extends('home')

@section('content')

<div class="app-title">
  
<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-sm">
      <div class="card" style="width: 32rem;">
        <div class="card-body">
          <h5 class="card-title">Atualização de Disciplina</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>

          <form method="post" action="/disciplina/editado">
            <div class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$disciplina->id}}">
              <label for="exampleInputNome">Nome do Disciplina</label>
              <input type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Disciplina" required>
            </div>
            <div class="form-group">
              <label for="exampleInputNuMatricula">Valor da Disciplina</label>
              <input min="0" type="number" name="valor" class="form-control" id="exampleInputNuMatricula" placeholder="Valor Disciplina" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nomeCurso" value="{{$disciplina->nomeCurso}}" hidden>
                <input type="hidden" name="idCurso" value="{{$disciplina->idCurso}}">
            </div>
            </select>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

