<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    //



    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


}
