<?php

namespace App\Http\Controllers;

use App\Models\Peca;
use Illuminate\Http\Request;

class PecaController extends Controller
{
    public function index()
    {
        $pecas = Peca::all();
        return view('pecas.index', compact('pecas'));
    }

    public function create()
    {
        return view('pecas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'fabricante' => 'required',
            'modelo' => 'required',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'descricao' => 'nullable'
        ]);

        Peca::create($request->all());

        return redirect()->route('pecas.index')
            ->with('success', 'Peça cadastrada com sucesso!');
    }

    public function show(Peca $peca)
    {
        return view('pecas.show', compact('peca'));
    }

    public function edit(Peca $peca)
    {
        return view('pecas.edit', compact('peca'));
    }

    public function update(Request $request, Peca $peca)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'fabricante' => 'required',
            'modelo' => 'required',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'descricao' => 'nullable'
        ]);

        $peca->update($request->all());

        return redirect()->route('pecas.index')
            ->with('success', 'Peça atualizada com sucesso!');
    }

    public function destroy(Peca $peca)
    {
        $peca->delete();

        return redirect()->route('pecas.index')
            ->with('success', 'Peça removida com sucesso!');
    }
}