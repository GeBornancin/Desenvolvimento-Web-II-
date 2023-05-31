<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Eixo;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $dados = Curso::with(['eixo' => function ($q) {
        $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('cursos.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $eixos = Eixo::all();
        
        return view('cursos.create', compact('eixos'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Curso::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo_id
        ]);
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dados = Curso::find($id);
        $eixos = Eixo::all();

       

        return view('cursos.edit', compact(['dados', 'eixos']));
    }

    public function update(Request $request, $id)
    {
       $obj = Curso::find($id);

        

        $obj->fill([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo_id
        ]);

        $obj->save();

        return redirect()->route('cursos.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj = Curso::find($id);

        $obj->destroy($id);

        return redirect()->route('cursos.index');
       
    }
}
