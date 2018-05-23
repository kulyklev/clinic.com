<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpicrisisAnnual extends Model
{
    protected $table = 'annual_epicrisis';

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}
