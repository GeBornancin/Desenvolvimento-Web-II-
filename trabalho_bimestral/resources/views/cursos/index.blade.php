@extends('templates.main')

@section('titulo')
Cursos
@endsection

@section('conteudo')
<div class="row">
    <div class="col">
        <x-datalistCurso
            :header="['NOME', 'SIGLA', 'AÇÕES']" 
            :data="$dados"
            :hide="[true, false, true, false]" 
            :remove="'nome'"
        />
    </div>
</div>

@endsection
