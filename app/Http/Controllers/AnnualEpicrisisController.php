<?php

namespace App\Http\Controllers;

use App\Models\AnnualEpicrisis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnnualEpicrisisController extends Controller
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
        if (Gate::allows('create-update-delete-actions')) {//TODO I need to pass patientID somehow
            return view('annualEpicrisis.registerAnnualepicrisis');
        } else {
            echo 'You can not create annual epicrisis';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::allows('create-update-delete-actions')) {
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
        if (Gate::allows('create-update-delete-actions')) {
            $annualEpicrisis = AnnualEpicrisis::find($id);
            return view('annualEpicrisis.editAnnualEpicrisis')->with('annualEpicrisis', $annualEpicrisis);
        } else {
            echo 'You can not edit annual epicrisis';
        }
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
        } else {
            echo 'You can not update annual epicrisis';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $annualEpicrisis = AnnualEpicrisis::find($id);
            $annualEpicrisis->delete();
            return 'Info about annual epicrisis deleted';
        } else {
            echo 'You can not destroy annual epicrisis';
        }
    }
}
