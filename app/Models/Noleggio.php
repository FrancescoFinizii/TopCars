<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Noleggio extends Model
{

    use HasFactory;


    public $timestamps = false;


    protected $table = 'noleggio';


    protected $fillable = [
        'importo',
        'dataRitiro',
        'localitàRitiro',
        'oraRitiro',
        'dataConsegna',
        'localitàConsegna',
        'oraConsegna',
        'attivo',
        'clienteID',
    ];


    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, "clienteID", "id");
    }


    public function auto(): BelongsTo
    {
        return $this->belongsTo(Auto::class, "autoID", "id");
    }


}
