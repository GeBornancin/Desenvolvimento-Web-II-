<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Livro;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        if(!UserPermissions::isAuthorized('generos.index')){
            abort(403);
        }

        $data = Genero::all();

        return view('generos.index', compact(['data']));
    }

    public function create()
    {
        if(!UserPermissions::isAuthorized('generos.create')) {
            abort(403);
        }

        return view('generos.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:100|min:3',
        ];
        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
        ];

        $request->validate($regras, $msgs);

        Genero::create([
            'nome' => $request->nome,
        ]);
        
        return redirect()->route('generos.index');    
    }

    public function show($id)
    {
        if(!UserPermissions::isAuthorized('generos.show')) {
            abort(403);
        }
    }

    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('generos.edit')) {
            abort(403);
        }

        $data = Genero::find($id);

         if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        
        return view('generos.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:3',
        ];
        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
        ];

        $request->validate($regras, $msgs);

        $obj = Genero::find($id);

        $obj->fill([
            'nome' => $request->nome,
        ]);

        $obj->save();

        return redirect()->route('generos.index');
    }

    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('generos.destroy')) {
            abort(403);
        }

        $obj = Genero::find($id);

        $obj->destroy($id);

        return redirect() ->route('generos.index');
    }
}
