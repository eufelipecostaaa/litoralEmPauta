<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colunista;

class ColunistaController extends Controller
{
    public function index()
    {
        $colunistas = Colunista::all();

        return view('colunistas.index', compact('colunistas'));
    }

    public function create()
    {
        return view('colunistas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:colunistas',
            'descricao' => 'required',
        ]);

        $colunista = Colunista::create($request->all());

        return redirect()->route('colunistas.index')->with('success', 'Colunista created successfully!');
    }

    public function edit($id)
    {
        $colunista = Colunista::find($id);
        return view('colunistas.edit', compact('colunista'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:colunistas,email,' . $id,
            'descricao' => 'required',
        ]);

        $colunista = Colunista::find($id);
        $colunista->update($request->all());

        return redirect()->route('colunistas.index')->with('success', 'Colunista updated successfully!');
    }

    public function destroy($id)
    {
        $colunista = Colunista::find($id);
        $colunista->delete();

        return redirect()->route('colunistas.index')->with('success', 'Colunista deleted successfully!');
    }
}
