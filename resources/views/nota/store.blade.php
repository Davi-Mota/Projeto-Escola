@extends('home')

@section('content')

<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro de Notas</h1>
          <form method="post" action="/nota/cadastrado">
            <div class="form-group col-8">
              {!! csrf_field() !!}
              <label for="exampleInputNome">Valor da Nota</label>
              <input type="text" name="valor" maxlength="4" class="form-control" id="exampleInputNome" placeholder="Nota" required>
            </div>
            <div class="form-group col-8">
            <label for="exampleInputNome">Referência da Nota</label>
              <input type="text" name="referencia" class="form-control" id="exampleInputNome" placeholder="Ex: Nota 1" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="idMatDisciplina" value="{{$matDisciplina->id}}"/>
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
