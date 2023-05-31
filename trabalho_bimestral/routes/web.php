<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');


Route::resource('eixos', 'EixoController');
Route::resource('cursos', 'CursoController');
Route::resource('professores', 'ProfessorController');
Route::resource('disciplinas', 'DisciplinaController');
