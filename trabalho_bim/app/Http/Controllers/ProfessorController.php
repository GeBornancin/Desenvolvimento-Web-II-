<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;
use App\Models\Professor;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Professor::with(['eixo' => function ($q){
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('professor.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eixos = Eixo::all();

        return view('professores.create', compact('eixos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Professor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixo_id,
            'status' => $request->status

        ]);
        return redirect()->route('professores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = Professor::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}