@extends('templates.main')
@section('titulo') Eixos / Áreas @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistEixo 
            crud="eixos" 
            :header="['Nome', 'Ações']" 
            :data="$dados" 
            :hide="[true, false]" 
            />
        </div>

    </div>
    
    @endsection