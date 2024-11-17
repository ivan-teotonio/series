<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller

{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $mensagemSucesso = session('sucesso');
        return view('series.index', compact('series', 'mensagemSucesso'))->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
       $serie = Serie::create($request->all());

       return redirect()->route('series.index')->with('sucesso',"Serie '{$serie->name}' criada com sucesso");
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        return to_route('series.index')
        ->with('sucesso',"Serie '{$series->name}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        // dd($request->all());
        // $serie->name = $request->name;
        // $serie->save();

        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('sucesso',"Serie '{$series->name}' atualizada com sucesso");
    }
}
