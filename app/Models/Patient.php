<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use FullTextSearch;

    protected $searchable = [
        'name',
        'surname',
        'patronymic'
    ];

    public function allergies(){
        return $this->hasMany('App\Models\AllergicHistory');
    }

    public function annualEpicrisis(){
        return $this->hasMany('App\Models\EpicrisisAnnual');
    }

    public function bloodTransfusions(){
        return $this->hasMany('App\Models\BloodTransfusion');
    }

    public function diary(){
        return $this->hasMany('App\Models\Diary');
    }

    public function drugIntolerance(){
        return $this->hasMany('App\Models\DrugIntolerance');
    }

    public function finalDiagnoses(){
        return $this->hasMany('App\Models\FinalDiagnosis');
    }

    public function hospitalizationData(){
        return $this->hasMany('App\Models\HospitalizationData');
    }

    public function infectiousDiseases(){
        return $this->hasMany('App\Models\InfectiousDisease');
    }

    public function surgicalInterventions(){
        return $this->hasMany('App\Models\SurgicalIntervention');
    }

    public function periodicHealthExaminations(){
        return $this->hasMany('App\Models\PeriodicHealthExamination');
    }

    public function termsOfTemporaryDisability(){
        return $this->hasMany('App\Models\TermOfTemporaryDisability');
    }

    public function vaccinationData(){
        return $this->hasMany('App\Models\VaccinationData');
    }
}
