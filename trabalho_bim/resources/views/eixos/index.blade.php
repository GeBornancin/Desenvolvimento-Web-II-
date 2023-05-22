@extends('templates.main')
@section('titulo') Eixos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatableEixo crud="eixos" :header="['Nome', 'Ações']" :data="$data" :hide="[true, false]" />
        </div>

    </div>
    
    @endsection