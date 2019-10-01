@extends('home')

@section('content')

<div class="container">
  <div class="row align-items-center">
    <div class="col-sm-8">
      <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h1 class="text-center">Cadastro da Matrícula na Disciplina</h1>
          <form method="post" action="/matDisciplina/cadastrado">
            <div class="form-group">
              {!! csrf_field() !!}
              <div class="form-group">
                <input type="hidden" name="idMatricula" value="{{$matricula->id}}"/>
              </div>
              <label for="">Selecione a Disciplina</label>
              <select class="form-control col-8" name="idDisciplina" required>
                <option value="none" selected disabled hidden>Selecione Disciplina</option>
                @foreach($disciplinas as $disciplina) 
                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                @endforeach
              </select>
              <label for="">Selecione o Professor</label>
              <select class="form-control col-8" name="idProfessor" required>
                <option value="none" selected disabled hidden>Selecione Professor</option>
                @foreach($professores as $professor) 
                <option value="{{$professor->id}}">{{$professor->nome}}</option>
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
