<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cognome',
        'residenza',
        'occupazione',
        'dataNascita',
        'foto',
    ];


    public function noleggio()
    {
        return $this->hasMany(Noleggio::class, "clienteID", "id");
    }


    /**
     * Get the utente's account.
     */
    public function utente(): MorphOne
    {
        return $this->morphOne(Utente::class, 'utenteable');
    }
}

