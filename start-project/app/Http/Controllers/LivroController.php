<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Livro;
use App\Models\Genero;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        if(!UserPermissions::isAuthorized('livros.index')){
            abort(403);
        }

        $data = Livro::with('genero')->get();

        return view('livros.index', compact('data'));
    }

    public function create()
    {
        if(!UserPermissions::isAuthorized('livros.create')){
            abort(403);
        }

        $generos = Genero::all();

        return view('livros.create', compact('generos'));
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

        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'pagina' => $request->pagina,
            'genero_id'=> $request->genero_id
        ]);

        return redirect()->route('livros.index');
    }

    public function show($id)
    {
        if(!UserPermissions::isAuthorized('livros.create')){
            abort(403);
        }
    }

    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('livros.create')){
            abort(403);
        }
        $data = Livro::find($id);
        $generos = Genero::all();

        return view('livros.edit', compact(['data','generos']));
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

        $obj = Livro::find($id);

        $obj->fill([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'pagina' => $request->pagina,
            'genero_id'=> $request->genero_id
        ]);

        $obj->save();

        return redirect()->route('livros.index');
    }

    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('livros.create')){
            abort(403);
        }

        $obj = Livro::find($id);

        $obj->destroy($id);

        return redirect()->route('livros.index');
    }
}
