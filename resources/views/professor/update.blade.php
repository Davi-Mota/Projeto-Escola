@extends('home')

@section('content')

<div class="app-title">

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm">
      <div class="card" style="width: 32rem;">
        <div class="card-body">
          <h5 class="card-title">Atualização de Professor</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>

          <form method="post" action="/professor/editado">
            <div class="form-group">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$professor->id}}"> 
              <label for="exampleInputNome">Nome do professor</label>
              <input  maxlength="50" type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Professor" required>
            </div>
            <div class="form-group">
              <label for="exampleInputNome">Formação do professor</label>
              <input  maxlength="50" type="text" name="formacao" class="form-control" id="exampleInputNome" placeholder="Formação Professor" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

