<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalizationData extends Model
{
    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
