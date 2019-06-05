<?php
namespace App\Services;

use App\Serie;

class CriadorDeSerie
{
    public function  criarSerie(string $nomeSerie, int $qtd_temporadas, int $ep_temporadas):Serie
    {
        $serie = Serie::create(['nome'=> $nomeSerie]);


        for($i=1; $i <= $qtd_temporadas; $i++)
        {
            $temporada = $serie->temporadas()->create(['numero' => $i]);


            for($j=1; $j <= $ep_temporadas; $j++)
            {
                $temporada->episodios()->create(['numero'=>$j]);

            }
         }
            return $serie;
    }
}
