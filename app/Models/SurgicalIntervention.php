<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurgicalIntervention extends Model
{
    protected $table = 'surgical_interventions';

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
