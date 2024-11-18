<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        
    }
    public function index(Request $request)
    {
        
        // $series = Serie::query()->orderBy('name')->get()
         $series = Series::all();
       // $series = Series::with(['temporadas'])->get(); //perde perfomace
        $mensagemSucesso = session('sucesso');
        return view('series.index', compact('series', 'mensagemSucesso'))->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
       $serie = $this->repository->add($request);
       return redirect()->route('series.index')->with('sucesso',"Serie '{$serie->name}' criada com sucesso");

    }

    // public function store(SeriesFormRequest $request)
    // {
    //     DB::transaction(function () use ($request) {
    //         // Cria a série explicitamente com os dados validados
    //         $serie = Series::create([
    //             'name' => $request->validated()['name'],
    //         ]);
    //         // Criação de temporadas e episódios
    //         collect(range(1, $request->seasonsQtd))->each(function ($seasonNumber) use ($serie, $request) {
    //             $season = $serie->seasons()->create([
    //                 'number' => $seasonNumber,
    //             ]);

    //             // Criação dos episódios para cada temporada
    //             $episodesData = collect(range(1, $request->episodesPerSeason))->map(fn($episodeNumber) => [
    //                 'number' => $episodeNumber,
    //             ])->toArray();

    //             $season->episodes()->createMany($episodesData);
    //         });
    //     });

    //     return redirect()->route('series.index')->with('sucesso', "Série '{$request->name}' criada com sucesso");
    // }

    public function destroy(Series $series, Request $request)
    {
        $series->delete();
        return to_route('series.index')
        ->with('sucesso',"Serie '{$series->name}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        // dd($request->all());
        // $serie->name = $request->name;
        // $serie->save();

        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('sucesso',"Serie '{$series->name}' atualizada com sucesso");
    }
}
