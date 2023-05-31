<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Disciplina;


class DisciplinaController extends Controller
{
    
    public function index()
    {
        $dados = Disciplina::with(['curso' => function ($q) {
        $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('disciplinas.index', compact('dados'));
    }

    public function create(){

        $cursos = Curso::all();

        return view('disciplinas.create',compact('cursos'));
    }
    
    public function store(Request $request){

        Disciplina::create([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id,
            'carga' => $request->carga
        ]);
        return redirect()->route('disciplinas.index');
    }

    public function edit(string $id){
    
        $dados = Disciplina::with(['curso' => function ($q) {
            $q->withTrashed();
        }])->find($id);

        $cursos = Curso::all();

        return view('disciplinas.edit', compact(['dados', 'cursos']));
    }

    public function update (Request $request, string $id){

        $obj = Disciplina::find($id);

        $obj->fill([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id,
            'carga' => $request->carga
        ]);

        $obj->save();

        return redirect()->route('disciplinas.index');
    }

    public function destroy(string $id){

        $obj = Disciplina::find($id);
        $obj->destroy($id);

        return redirect()->route('disciplinas.index');
    }

}
