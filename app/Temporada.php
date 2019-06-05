<?php

namespace App;
use App\Serie;
use App\Episodio;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function episodios()
    {
        return  $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return  $this->belongsTo(Serie::class);
    }

    public function getEpisodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function(\App\Episodio $episodio){

            return $episodio->assistido;

        });
    }
}
