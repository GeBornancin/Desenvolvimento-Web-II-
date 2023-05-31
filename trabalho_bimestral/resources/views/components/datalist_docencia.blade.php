<div class="row">
    <div class="col">
        <h3 class="display-7 text-secondary d-none d-md-block"><b>Docência</b></h3>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('docencias.create') }}" class="btn btn-primary btn-create">
            <caption>Adicionar Docência</b></caption>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
        </a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table align-middle caption-top  table table-striped">
            <caption>Tabela de <b>Disciplinas / Professores</b></caption>
            <thead>
                <tr class="header-table">
                    @php $cont=0; @endphp
                    @foreach ($header as $item)

                    @if($hide[$cont])
                    <th scope="col" class="d-none d-md-table-cell">{{ $item }}</th>
                    @else
                    <th scope="col">{{ $item }}</th>
                    @endif
                    @php $cont++; @endphp

                    @endforeach
                </tr>
            </thead>
            <tbody>
               
                @foreach ($data as $item)
                <tr>
                    <td class="d-none d-md-table-cell">
                        {{ $item->disciplina->nome }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $item->professor->nome }}
                    </td>
                    <td>
                    
                        <a nohref style="cursor:pointer" onclick="showInfoModal('Curso: {{ $item->disciplina->curso->nome}}({{ $item->disciplina->curso->sigla}}).','Carga Horária: {{ $item->disciplina->carga}} horas.')" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item->id }}', '{{ $item->nome }}')" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </a>
                    </td>
                    <form action="{{ route('docencias.destroy', $item->id) }}" method="POST" id="form_{{$item->id}}">                        
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>