@extends('templates.middleware', [
    'titulo' => "Livros", 
    'rota' => "livros.create"    
])

@section('titulo') Livros @endsection

@section('conteudo')

<div>
    
    <table class="table align-middle caption-top table-striped">

        <caption>Tabela de <b>Livros</b></caption>
   
        @if(UserPermissions::isAuthorized('livros.create'))
        <a href="{{route('livros.create')}}" class="btn btn-success btn-block align-content-center">Livros</a>
        @endif

        <thead>
            <tr>
               <th scope="col">Nome</th>
               <th scope="col" class="d-none d-md-table-cell">Autor</th>
               <th scope="col">Paginas</th>
               <th scope="col" class="d-none d-md-table-cell">Gêneros</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->autor }}</td>
                    <td>{{ $item->pagina }}</td>
                    <td>{{ $item->genero->nome }}</td>
                    <td>
                        @if(UserPermissions::isAuthorized('livros.edit'))
                        <a href= "{{ route('livros.edit', $item->id) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                            </svg>
                        </a>
                        @endif
                        @if(UserPermissions::isAuthorized('livros.destroy'))
                        <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item['id'] }}', '{{ $item['nome'] }}')" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                        @endif
                    </td>
                    <form action="{{ route('livros.destroy', $item['id']) }}" method="POST" id="form_{{$item['id']}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection