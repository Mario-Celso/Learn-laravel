<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;
use App\Temporada;
use App\Episodio;
class Episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}

