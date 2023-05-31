<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;


class EixoController extends Controller
{
    
    
    public function index()
    {
         $dados = Eixo::all();

       return view('eixos.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eixos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Eixo::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('eixos.index');
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
    public function edit(string $id)
    {
        $dados = Eixo::find($id);

       
        return view('eixos.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
       $obj = Eixo::find($id);

        $obj->fill([
            'nome' => $request->nome
        ]);

        $obj->save();

        return redirect()->route('eixos.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $obj = Eixo::find($id);

        $obj->destroy($id);

        return redirect()->route('eixos.index');
        
    }
}
