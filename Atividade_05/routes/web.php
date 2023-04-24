<?php

use Illuminate\Support\Facades\Route;





Route::prefix('/aluno')->group(function() {

    Route::get('/', function () {

        $dados = array(
            "Jordana",
            "Marcos",
            "Caio Pedro",
            "Juliano",
            "Tim Maia"
        );


        $alunos = "<ul>";
        foreach ($dados as $nome) {
            $alunos .= "<li>$nome</li>";
        }

        $alunos .= "</ul>";

        return $alunos;

    })->name('aluno');

    Route::get('/limite/{valor}', function($valor) {
        $dados = array(
            "Jordana",
            "Marcos",
            "Caio Pedro",
            "Juliano",
            "Tim Maia"
        );

        $alunos = "<ul>";
        if ($valor <= count($dados)) {
            $cont = 0;
            foreach ($dados as $nome) {
                $alunos .= "<li>$nome</li>";
                $cont++;
                if ($cont >= $valor) break;
            }
        } else {
            $alunos = $alunos."<li>Tamanho Máximo = ".count($dados)."</li>";
        }

        $alunos .= "</ul>";
        return $alunos;

    })->name('aluno.limite')->where('valor', '[0-9]+');

    Route::get('/matricula/{valor}', function($valor) {

        $dados = array(
            "Jordana",
            "Marcos",
            "Caio Pedro",
            "Juliano",
            "Tim Maia"
        );
        $aluno = "<ul>";

        if ($valor <= count($dados)) {
            $cont = 0;


            foreach ($dados as $nome) {
                if ($cont == $valor - 1) {
                    $aluno .= $valor." - ".$nome;
                    break;
                }
                $cont++;
            }


        } else {
            $aluno = $aluno."<li>NÂO ENCONTRADO!</li>";
        }

        $aluno .= "</ul>";
        return $aluno;

    })->name('aluno.matricula')->where('valor', '[0-9]+');

    Route::get('/nome/{name}', function($name) {

        
        $dados = array(
            "Jordana",
            "Marcos",
            "Caio Pedro",
            "Juliano",
            "Tim Maia"
        );

        $aluno = "<ul>";
        $flag = 0;

        foreach ($dados as $nome) {
            if (!strcmp($name, $nome)) {
                $aluno .= $nome;
                $flag = 1;
            }
        }
        if ($flag == 0) {
            $aluno = $aluno."<li>NÃO ENCONTRADO!</li>";
        }

        $aluno .= "</ul>";

        return $aluno;

    })->name('aluno.nome')->where('name', '[A-Za-z]+');

});



Route::prefix('/nota')->group(function() {

    Route::get('/', function() {


        $dados = array(
            array("matricula" => 1, "nome" => "Jordana", "nota" => 10),
            array("matricula" => 2, "nome" => "Marcos", "nota" => 3),
            array("matricula" => 3, "nome" => "Caio Pedro", "nota" => 6),
            array("matricula" => 4, "nome" => "Juliano", "nota" => 7),
            array("matricula" => 5, "nome" => "Tim Maia", "nota" => 0.3)
        );

        $tabela = '<table>';
        $tabela .= '<tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>';

        foreach ($dados as $linha) {
            $tabela .= '<tr>';
            foreach ($linha as $valor) {
                $tabela .= '<td>' . $valor . '</td>';
            }
            $tabela .= '</tr>';
        }
        


        $tabela .= '</table>';

        return $tabela;

    })->name('nota');

    Route::get('/limite/{valor}', function($valor) {

        $dados = array(
            array("matricula" => 1, "nome" => "Jordana", "nota" => 10),
            array("matricula" => 2, "nome" => "Marcos", "nota" => 3),
            array("matricula" => 3, "nome" => "Caio Pedro", "nota" => 6),
            array("matricula" => 4, "nome" => "Juliano", "nota" => 7),
            array("matricula" => 5, "nome" => "Tim Maia", "nota" => 0.3)
        );


        if ($valor <= count($dados)) {

            $tabela = '<table>';
            $tabela .= '<tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>';

            foreach (array_slice($dados, 0, $valor) as $linha) {
                $tabela .= '<tr>';
                foreach ($linha as $valor) {
                    $tabela .= '<td>' . $valor . '</td>';
                }

                $tabela .= '</tr>';
            }

        } else {
            $tabela = "<h2>Tamanho Máximo = " .count($dados)."</h2>";
        }

        $tabela .= '</table>';


        return $tabela;

    })->name('nota.limite')->where('valor', '[0-9]+');



    Route::get('/lancar/{nota}/{matricula}/{nome?}', function($nota, $matricula, $nome = null) {

        $dados = array(
            array("matricula" => 1, "nome" => "Jordana", "nota" => 10),
            array("matricula" => 2, "nome" => "Marcos", "nota" => 3),
            array("matricula" => 3, "nome" => "Caio Pedro", "nota" => 6),
            array("matricula" => 4, "nome" => "Juliano", "nota" => 7),
            array("matricula" => 5, "nome" => "Tim Maia", "nota" => 0.3)
        );




        $flag = 0;


        if ($nome != null) {

            foreach ($dados as $chave => $valor) {
                if (strcmp($valor['nome'],$nome) === 0) {
                    $dados[$chave]['nota'] = $nota;
                    $flag = 1;
                    break;
                }
                
            }

        } else {

            foreach ($dados as $chave => $valor) {
                if ($valor['matricula'] == $matricula) {
                    $dados[$chave]['nota'] = $nota;
                    $flag = 1;
                    break;
                }
            }
        }


        if ($flag == 0) {
            return '<li>NÃO ENCONTRADO!</li>';
        }

        $tabela = '<table>';
        $tabela .= '<tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>';

        foreach ($dados as $linha) {
            $tabela .= '<tr>';
            foreach ($linha as $valor) {
                $tabela .= '<td>' . $valor . '</td>';
            }
            $tabela .= '</tr>';
        }
        
        $tabela .= '</table>';

        return $tabela;

    })->name('nota.lancar')->where('nota', '[0-9]+')->where('matricula', '[0-9]+');

    Route::get('/conceito/{valorA}/{valorB}/{valorC}', function($valorA, $valorB, $valorC) {

        $dados = array(
            array("matricula" => 1, "nome" => "Jordana", "nota" => 10),
            array("matricula" => 2, "nome" => "Marcos", "nota" => 3),
            array("matricula" => 3, "nome" => "Caio Pedro", "nota" => 6),
            array("matricula" => 4, "nome" => "Juliano", "nota" => 7),
            array("matricula" => 5, "nome" => "Tim Maia", "nota" => 0.3)
        );

        foreach ($dados as $chave => $valor) {
            if ($valor['nota'] >= $valorA) {
                $dados[$chave]['nota'] = "A";
            } 
            else if ($valor['nota'] >= $valorB) {
                $dados[$chave]['nota'] = "B";
            } 
            else if($valor['nota'] >= $valorC) {
                $dados[$chave]['nota'] = "C";
            } 
            else {
                $dados[$chave]['nota'] = "D";
            }
        }

        $tabela = '<table>';
        $tabela .= '<tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>';

        foreach ($dados as $linha) {
            $tabela .= '<tr>';
            foreach ($linha as $valor) {
                $tabela .= '<td>' . $valor . '</td>';
            }
            $tabela .= '</tr>';
        }
        
        $tabela .= '</table>';

        return $tabela;

    })->name('nota.conceito')
      ->where('valorA', '[0-9]+')
      ->where('valorB', '[0-9]+')
      ->where('valorC', '[0-9]+');

    Route::post('/conceito', function(Request $request) {

        $dados = array(
            array("matricula" => 1, "nome" => "Jordana", "nota" => 10),
            array("matricula" => 2, "nome" => "Marcos", "nota" => 3),
            array("matricula" => 3, "nome" => "Caio Pedro", "nota" => 6),
            array("matricula" => 4, "nome" => "Juliano", "nota" => 7),
            array("matricula" => 5, "nome" => "Tim Maia", "nota" => 0.3)
        );

        foreach ($dados as $chave => $valor) {
            if ($valor['nota'] > $request->input('A')) {
                $dados[$chave]['nota'] = "A";
            } 
            else if ($valor['nota'] > $request->input('B')) {
                $dados[$chave]['nota'] = "B";
            } 
            else if($valor['nota'] >= $request->input('C')) {
                $dados[$chave]['nota'] = "C";
            } 
            else {
                $dados[$chave]['nota'] = "D";
            }
        }

        $tabela = '<table>';
        $tabela .= '<tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>';

        foreach ($dados as $linha) {
            $tabela .= '<tr>';
            foreach ($linha as $valor) {
                $tabela .= '<td>' . $valor . '</td>';
            }
            $tabela .= '</tr>';
        }
        
        $tabela .= '</table>';

        return $tabela;

    });

});
