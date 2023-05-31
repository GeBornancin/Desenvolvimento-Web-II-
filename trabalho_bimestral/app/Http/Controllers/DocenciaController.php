<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Docencia;

class DocenciaController extends Controller
{

    public function index() {
        
        $dados = Docencia::with(['professor','disciplina' => function ($q) {
            $q->withTrashed();
        }])->orderBy('id')->get();

        return view('docencias.index', compact('dados'));
    }

    public function create(){

        $professores = Professor::all();
        $disciplinas = Disciplina::all();

        return view('docencias.create', compact('professores','disciplinas'));
    }


    public function store(Request $request){

        Docencia::create([
            'professor_id'=> $request->professor_id,
            'disciplina_id' => $request->disciplina_id
        ]);

        return redirect()->route('docencias.index');
    }
    
    public function destroy(string $id){

        $obj = Docencia::find($id);

        $obj->destroy($id);

        return redirect()->route('docencias.index');
    }


}