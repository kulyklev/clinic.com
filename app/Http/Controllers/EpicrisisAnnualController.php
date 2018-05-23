<?php

namespace App\Http\Controllers;

use App\Models\EpicrisisAnnual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EpicrisisAnnualController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $epicrisisAnnual = EpicrisisAnnual::where('patient_id', $patientID)->get();
        return view('annualEpicrisis.annualEpicrisis')->with(['epicrisisAnnual' => $epicrisisAnnual, 'patientID' => $patientID]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function create($patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            return view('annualEpicrisis.registerAnnualepicrisis')->with(['patientID' => $patientID]);
        } else {
            echo 'You can not create annual epicrisis';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
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

            $newAnnualEpicrisis = new EpicrisisAnnual();
            $newAnnualEpicrisis->patient_id = $patientID;
            $newAnnualEpicrisis->epicrisisDate = $request->input('epicrisisDate');
            $newAnnualEpicrisis->causeOfObservation = $request->input('causeOfObservation');
            $newAnnualEpicrisis->mainDiagnosis = $request->input('mainDiagnosis');
            $newAnnualEpicrisis->concomitantDiagnoses = $request->input('concomitantDiagnoses');
            $newAnnualEpicrisis->numberOfAggravations = $request->input('numberOfAggravations');
            $newAnnualEpicrisis->carryingOutTreatment = $request->input('carryingOutTreatment');
            $newAnnualEpicrisis->disabilityGroup = $request->input('disabilityGroup');
            $newAnnualEpicrisis->sanatoriumAndSpaTreatment = $request->input('sanatoriumAndSpaTreatment');
            $newAnnualEpicrisis->save();
        } else {
            echo 'You can not store annual epicrisis';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annualEpicrisis = EpicrisisAnnual::where('patient_id', $id)->get();
        return view('annualEpicrisis.annualEpicrisis')->with(['annualEpicrisis' => $annualEpicrisis, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $epicrisisAnnual = EpicrisisAnnual::find($id);
            return view('annualEpicrisis.editAnnualEpicrisis')->with(['patientID' => $patientID,  'epicrisisAnnual' => $epicrisisAnnual]);
        } else {
            echo 'You can not edit annual epicrisis';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
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

            $newAnnualEpicrisis = EpicrisisAnnual::find($id);
            $newAnnualEpicrisis->epicrisisDate = $request->input('epicrisisDate');
            $newAnnualEpicrisis->causeOfObservation = $request->input('causeOfObservation');
            $newAnnualEpicrisis->mainDiagnosis = $request->input('mainDiagnosis');
            $newAnnualEpicrisis->concomitantDiagnoses = $request->input('concomitantDiagnoses');
            $newAnnualEpicrisis->numberOfAggravations = $request->input('numberOfAggravations');
            $newAnnualEpicrisis->carryingOutTreatment = $request->input('carryingOutTreatment');
            $newAnnualEpicrisis->disabilityGroup = $request->input('disabilityGroup');
            $newAnnualEpicrisis->sanatoriumAndSpaTreatment = $request->input('sanatoriumAndSpaTreatment');
            $newAnnualEpicrisis->save();
        } else {
            echo 'You can not update annual epicrisis';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $annualEpicrisis = EpicrisisAnnual::find($id);
            $annualEpicrisis->delete();
            return 'Info about annual epicrisis deleted';
        } else {
            echo 'You can not destroy annual epicrisis';
        }
    }
}
