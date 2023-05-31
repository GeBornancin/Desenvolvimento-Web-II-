@extends('templates.main')

@section('titulo')
Disciplinas
@endsection

@section('conteudo')
<div class="row">
    <div class="col">
        <x-datalistDisciplina
            :header="['Nome', 'Curso', 'Ações']" 
            :data="$dados"
            :hide="[true, false, true,false]" 
            :remove="'nome'"
        />
    </div>
</div>

@endsection
