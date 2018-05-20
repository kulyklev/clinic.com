<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodicHealthExamination extends Model
{
    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
