<?php

namespace App\Http\Controllers;

use App\Models\AnnualEpicrisis;
use Illuminate\Http\Request;

class AnnualEpicrisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO I need to pass patientID somehow
        return view('annualEpicrisis.registerAnnualepicrisis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'epicrisisDate' => 'required',
            'causeOfObservation' => 'required',
            'mainDiagnosis' => 'required',
            'concomitantDiagnoses' => 'required',
            'numberOfAggravations' => 'required',
            'carryingOutTreatment' => 'required',
            'disabilityGroup' => 'required',
            'sanatoriumAndSpaTreatment' => 'required',
        ]);

        $newAnnualEpicrisis = new AnnualEpicrisis();
        $newAnnualEpicrisis->patient_id = $request->input('patient_id');
        $newAnnualEpicrisis->epicrisisDate = $request->input('epicrisisDate');
        $newAnnualEpicrisis->causeOfObservation = $request->input('causeOfObservation');
        $newAnnualEpicrisis->mainDiagnosis = $request->input('mainDiagnosis');
        $newAnnualEpicrisis->concomitantDiagnoses = $request->input('concomitantDiagnoses');
        $newAnnualEpicrisis->numberOfAggravations = $request->input('numberOfAggravations');
        $newAnnualEpicrisis->carryingOutTreatment = $request->input('carryingOutTreatment');
        $newAnnualEpicrisis->disabilityGroup = $request->input('disabilityGroup');
        $newAnnualEpicrisis->sanatoriumAndSpaTreatment = $request->input('sanatoriumAndSpaTreatment');
        $newAnnualEpicrisis->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annualEpicrisis = AnnualEpicrisis::where('patient_id', $id)->get();
        return view('annualEpicrisis.annualEpicrisis')->with(['annualEpicrisis' => $annualEpicrisis, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annualEpicrisis = AnnualEpicrisis::find($id);
        return view('annualEpicrisis.editAnnualEpicrisis')->with('annualEpicrisis', $annualEpicrisis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'epicrisisDate' => 'required',
            'causeOfObservation' => 'required',
            'mainDiagnosis' => 'required',
            'concomitantDiagnoses' => 'required',
            'numberOfAggravations' => 'required',
            'carryingOutTreatment' => 'required',
            'disabilityGroup' => 'required',
            'sanatoriumAndSpaTreatment' => 'required',
        ]);

        $newAnnualEpicrisis = AnnualEpicrisis::find($id);
        $newAnnualEpicrisis->epicrisisDate = $request->input('epicrisisDate');
        $newAnnualEpicrisis->causeOfObservation = $request->input('causeOfObservation');
        $newAnnualEpicrisis->mainDiagnosis = $request->input('mainDiagnosis');
        $newAnnualEpicrisis->concomitantDiagnoses = $request->input('concomitantDiagnoses');
        $newAnnualEpicrisis->numberOfAggravations = $request->input('numberOfAggravations');
        $newAnnualEpicrisis->carryingOutTreatment = $request->input('carryingOutTreatment');
        $newAnnualEpicrisis->disabilityGroup = $request->input('disabilityGroup');
        $newAnnualEpicrisis->sanatoriumAndSpaTreatment = $request->input('sanatoriumAndSpaTreatment');
        $newAnnualEpicrisis->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annualEpicrisis = AnnualEpicrisis::find($id);
        $annualEpicrisis->delete();
        return 'Info about annual epicrisis deleted';
    }
}
