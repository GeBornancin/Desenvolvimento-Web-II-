<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\Eixo;

class DisciplinaTest extends TestCase
{
    use RefreshDatabase;

    public function testCarga(){
        $eixo = new Eixo();
        $eixo->nome = 'TECNOLOGIA INFORMAÇÃO';
        $eixo->save();

        $curso = new Curso();
        $curso->nome = 'ANALISE E DESENVOLVIMENTO DE SISTEMAS';
        $curso->sigla = 'TADS';
        $curso->tempo = '3';
        $curso->eixo_id = $eixo->id;
        $curso->save();

        //Carga com número médio (5000)
        $disciplina = new Disciplina();
        $disciplina->nome = 'Disciplina Teste';
        $disciplina->curso_id = $curso->id;
        $disciplina->carga = 500; // número médio 
        $disciplina->save();
          
        
        $this->assertTrue($disciplina->carga >= 1 && $disciplina->carga <= 999);

         
        
    }
}