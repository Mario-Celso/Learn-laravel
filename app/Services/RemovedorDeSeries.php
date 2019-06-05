<?php
namespace App\Services;

use App\Serie;
use App\Temporada;
use App\Episodio;
use Illuminate\Support\Facades\DB;

class RemovedorDeSeries
{
    public function removerSerie(int $serieId):String
    {
        $nomeSerie ='';

        DB::transaction(function ()  use($serieId, &$nomeSerie)
        {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie-> nome;
            /**
             * @param $serie
             */


            $this->removerSerieeTemporadas($serie);

        });


        return $nomeSerie;
    }


    public function removerSerieeTemporadas($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada)
            {
                $temporada->episodios->each(function (Episodio $episodio)
                {
                    $episodio->delete();
                });

                $temporada->delete();
            });

            $serie->delete();
    }
}
