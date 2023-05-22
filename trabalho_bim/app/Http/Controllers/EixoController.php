<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EixoController extends Controller
{
    
    
    public function index()
    {
        $data = DB::select('select * from eixos');
        
        return view('eixos.index', ['data' => $data]);
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
        $nome = $request->input('nome');

        DB::insert('insert into eixos (nome) values (?)', [$nome]);

        return redirect()->route('eixos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $data = DB::table('eixos')->find($id);

    return view('eixos.show', compact('data'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('eixos')->find($id);

        return view('eixos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        $nome = $request->input('nome');

        DB::table('eixos')
            ->where('id', $id)
            ->update(['nome' => $nome]);

        $data = DB::table('eixos')
            ->where('id', $id)
            ->first();

        return redirect()->route('eixos.index', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('eixos')->where('id', $id)->delete();

        return redirect()->route('eixos.index');
        
    }
}
