<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="listaaluno">
    <h2> Lista de Alunos</h2>
    
    <ul>
    @foreach ($alunos as $aluno)
        <li>{{ $aluno }}</li>
    @endforeach
    </ul>
</div>
