<?php

Route::resource('/', 'AlunosController');
/*
Route::get('/', function () {
    return view('home');
});*/

// ALUNOS
Route::get('/aluno/cadastro', 'AlunosController@create');
Route::post('/aluno/cadastrado', 'AlunosController@store');
Route::get('/aluno/editar/{id}', 'AlunosController@edit');
Route::post('/aluno/editado', 'AlunosController@update');
Route::get('/aluno/delete/{id}', 'AlunosController@destroy');
Route::resource('/aluno', 'AlunosController');

// PROFESSORES
Route::get('/professor/cadastro', 'ProfessoresController@create');
Route::post('/professor/cadastrado', 'ProfessoresController@store');
Route::get('/professor/editar/{id}', 'ProfessoresController@edit');
Route::post('/professor/editado', 'ProfessoresController@update');
Route::get('/professor/delete/{id}', 'ProfessoresController@destroy');
Route::resource('/professor', 'ProfessoresController');

// CURSOS
Route::get('/curso/cadastro', 'CursosController@create');
Route::post('/curso/cadastrado', 'CursosController@store');
Route::get('/curso/editar/{id}', 'CursosController@edit');
Route::post('/curso/editado', 'CursosController@update');
Route::get('/curso/delete/{id}', 'CursosController@destroy');
Route::resource('/curso', 'CursosController');

// DISCIPLINAS
Route::get('/disciplina/cadastro', 'DisciplinasController@create');
Route::post('/disciplina/cadastrado', 'DisciplinasController@store');
Route::get('/disciplina/editar/{id}', 'DisciplinasController@edit');
Route::post('/disciplina/editado', 'DisciplinasController@update');
Route::get('/disciplina/delete/{id}', 'DisciplinasController@destroy');
Route::resource('/disciplina', 'DisciplinasController');

// MATRICULAS
Route::get('/matricula/cadastro/{id}', 'MatriculaController@create');
Route::post('/matricula/cadastrado', 'MatriculaController@store');
Route::get('/matricula/delete/{id}', 'MatriculaController@destroy');
Route::resource('/matricula', 'MatriculaController');

// MATDISCIPLINA
Route::get('/matDisciplina/cadastro/{id}', 'MatDisciplinasController@create');
Route::post('/matDisciplina/cadastrado', 'MatDisciplinasController@store');
Route::get('/matDisciplina/delete/{id}', 'MatDisciplinasController@destroy');
Route::resource('/matDisciplina', 'MatDisciplinasController');

// NOTAS
Route::get('/nota/cadastro/{id}', 'NotasController@create');
Route::post('/nota/cadastrado', 'NotasController@store');
Route::get('/nota/editar/{id}', 'NotasController@edit');
Route::post('/nota/editado', 'NotasController@update');
Route::get('/nota/delete/{id}', 'NotasController@destroy');
Route::resource('/nota', 'NotasController');
