<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use App\Episodio;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSeries;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function index(Request $request) {


        $series = Serie::all();
       //$series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        
        
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request, CriadorDeSerie $criadorDeSerie)
    {       
       

       
        $serie =$criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_temporadas);
     

        $request->session()->flash('mensagem', "Serie {$serie->nome} e suas temporadas/episodios criadas com sucesso.");
        return redirect()->route('index');

       
    }

    public function destroy(Request $request, RemovedorDeSeries $removedorDeSerie)
    {   $nomeSerie= $removedorDeSerie->removerSerie($request->id);
        $request->session()->flash('mensagem', "Série excluida.");

        return redirect()->route('index');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome=$request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
