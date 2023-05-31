@extends('templates.main')
@section('titulo') Professores @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistProfessor
            :header="['Nome', 'Eixo','Status','Ações']" 
            :data="$dados" 
            :hide="[true, false, true, false]" 
            :remove="'nome'"
            />
        </div>

    </div>
    
    @endsection