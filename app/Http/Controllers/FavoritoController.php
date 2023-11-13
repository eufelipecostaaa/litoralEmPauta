<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;

class FavoritoController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::all();

        return view('favoritos.index', compact('favoritos'));
    }

    public function create()
    {
        return view('favoritos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            // Adicione outras validações conforme necessário
        ]);

        $favorito = Favorito::create($request->all());

        return redirect()->route('favoritos.index')->with('success', 'Favorito criado com sucesso!');
    }

    public function destroy($id)
    {
        $favorito = Favorito::find($id);
        $favorito->delete();

        return redirect()->route('favoritos.index')->with('success', 'Favorito excluído com sucesso!');
    }
}
