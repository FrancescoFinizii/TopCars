<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Staff extends Model
{
    use HasFactory;


    protected $table = 'staff';

    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cognome',
        'foto',
    ];


    /**
     * Get the staff's account.
     */
    public function utente(): MorphOne
    {
        return $this->morphOne(Utente::class, 'utenteable');
    }

}

