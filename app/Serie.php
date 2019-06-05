<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Temporada;

class Serie extends Model
{
    public $timestamps  = false;
    protected $fillable = ['nome'];


    public function temporadas()
    {
        return $this->hasMany(Temporada::class);


    }
}



?>