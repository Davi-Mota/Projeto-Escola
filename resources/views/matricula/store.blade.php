@extends('home')

@section('content')

<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro de Matrícula</h1>
          <form method="post" action="/matricula/cadastrado">
            <div class="form-group col-8">
              {!! csrf_field() !!}
              <label for="exampleInputNome">Semestre da Matrícula</label>
              <input type="text" name="semestre" minlength="6" maxlength="6" pattern="[[0-9]+\.[1-2]]" class="form-control" id="exampleInputNome" placeholder="Ex: 2016.1" required>
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
            <div class="form-group col-8">
              <label for="">Aluno</label>
              <input type="text" class="form-control" name="nomeAluno" value="{{$aluno->nome}}" disabled/>
              <input type="hidden" name="idAluno" value="{{$aluno->id}}"/>
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
