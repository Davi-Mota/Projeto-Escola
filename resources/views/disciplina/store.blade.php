@extends('home')

@section('content')


<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro de Disciplina</h1>
          <form method="post" action="/disciplina/cadastrado">
            <div class="form-group col-8">
              {!! csrf_field() !!}
              <label for="exampleInputNome">Nome do Disciplina</label>
              <input type="text" name="nome" class="form-control" id="exampleInputNome" placeholder="Nome Disciplina" required>
            </div>
            <div class="form-group col-8">
              <label for="exampleInputNuMatricula">Valor da Disciplina</label>
              <input min="0" type="number" name="valor" class="form-control" id="exampleInputNuMatricula" placeholder="Valor Disciplina" required>
            </div>
            <div class="form-group col-8">
              <label for="">Selecione o Curso</label>
              <select class="form-control" name="idCurso" required>
                <option value="none" selected disabled hidden>Selecione Curso</option>
                @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                @endforeach
              </select>
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
