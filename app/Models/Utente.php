<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Utente extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    public $timestamps = false;


    protected $table = 'utente';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'username',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    /**
     * Get the parent accounteable model (cliente or staff).
     */
    public function utenteable() : MorphTo
    {
        return $this->morphTo();
    }

}

