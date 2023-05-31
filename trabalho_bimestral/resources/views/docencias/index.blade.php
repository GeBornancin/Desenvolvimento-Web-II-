@extends('templates.main')
@section('titulo') Docência @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistDocencia 
            :header="['Disciplina', 'Professor','Ações']" 
            :data="$dados" 
            :hide="[true, false,true]" 
            :remove="'nome'"
            />
        </div>

    </div>
    
    @endsection