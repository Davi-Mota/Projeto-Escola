@extends('home')

@section('content')

<div class="app-title">


<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-sm">
      <div class="card" style="width: 32rem;">
        <div class="card-body">
        <h5 class="card-title">Atualização de Nota</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <form method="post" action="/nota/editado">
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
              <input type="hidden" name="idMatDisciplina" value="{{$nota->idMatDisciplina}}"/>
              <input type="hidden" name="id" value="{{$nota->id}}"/>
            </div>
            <div class="from-group col-8">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
