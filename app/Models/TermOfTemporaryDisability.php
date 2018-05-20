<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermOfTemporaryDisability extends Model
{
    protected $table = 'terms_of_temporary_disability';

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
