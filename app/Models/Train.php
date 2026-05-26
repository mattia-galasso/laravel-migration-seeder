<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    //Convertire la colonna departure_time in oggetto Carbon per l'utilizzo del metodo format()
    protected $casts = [
        'departure_time' => 'datetime'
    ];
}
