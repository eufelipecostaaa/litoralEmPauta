<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
            'fonte' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->imagem->extension();  
        $request->imagem->move(public_path('images'), $imageName);

        $materia = new Materia([
            'titulo' => $request->get('titulo'),
            'conteudo' => $request->get('conteudo'),
            'fonte' => $request->get('fonte'),
            'imagem' => $imageName
        ]);
        $materia->save();
        return redirect('/materias')->with('success', 'Materia criada!');
    }

    public function edit($id)
    {
        $materia = Materia::find($id);
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
            'fonte' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->imagem->extension();  
        $request->imagem->move(public_path('images'), $imageName);

        $materia = Materia::find($id);
        $materia->titulo = $request->get('titulo');
        $materia->conteudo = $request->get('conteudo');
        $materia->fonte = $request->get('fonte');
        $materia->imagem = $imageName;
        $materia->save();
        return redirect('/materias')->with('success', 'Materia atualizada!');
    }

    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();
        return redirect('/materias')->with('success', 'Materia deletada!');
    }
}
