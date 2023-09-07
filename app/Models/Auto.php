<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Auto extends Model
{

    use HasFactory;


    public $timestamps = false;

    protected $table = 'auto';

    protected $fillable = [
        'targa',
        'modello',
        'marca',
        'motore',
        'cambio',
        'bagaglio',
        'porte',
        'posti',
        'autonomia',
        'colore',
        'foto',
        'descrizione',
        'emissione',
        'scadenza',
        'costoGiornaliero',
    ];


    public function noleggio(): HasMany
    {
        return $this->hasMany(Noleggio::class, "autoID", "id");
    }

}
