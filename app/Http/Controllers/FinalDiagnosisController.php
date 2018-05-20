<?php

namespace App\Http\Controllers;

use App\Models\FinalDiagnosis;
use Illuminate\Http\Request;

class FinalDiagnosisController extends Controller
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
        //TODO Delete index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO I need to pass patientID somehow
        return view('finalDiagnosis.registerDiagnosis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO Validation doesn`t pass while bool fields are false
        $this->validate($request, [
            'patientID' => 'required',
            'dateOfTreatment' => 'required',
            'finalDiagnosis' => 'required',
            'firstTimeDiagnosed' => 'required',
            'firstTimeDiagnosedOnProphylaxis' => 'required',
            'doctor' => 'required',
        ]);

        $newFinalDiagnosis = new FinalDiagnosis();
        $newFinalDiagnosis->patient_id = $request->input('patientID');
        $newFinalDiagnosis->dateOfTreatment = $request->input('dateOfTreatment');
        $newFinalDiagnosis->finalDiagnosis = $request->input('finalDiagnosis');
        $newFinalDiagnosis->firstTimeDiagnosed = $request->input('firstTimeDiagnosed');
        $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $request->input('firstTimeDiagnosedOnProphylaxis');
        $newFinalDiagnosis->doctor = $request->input('doctor');
        $newFinalDiagnosis->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finalDiagnosis = FinalDiagnosis::where('patient_id', $id)->get();
        return view('finalDiagnosis.listOfFinalDiagnosis')->with(['finalDiagnosis' => $finalDiagnosis, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finalDiagnosis = FinalDiagnosis::find($id);
        return view('finalDiagnosis.editFinalDiagnosis')->with('finalDiagnosis', $finalDiagnosis);
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
        //TODO Validation doesn`t pass while bool fields are false
        $this->validate($request, [
            'dateOfTreatment' => 'required',
            'finalDiagnosis' => 'required',
            'firstTimeDiagnosed' => 'required',
            'firstTimeDiagnosedOnProphylaxis' => 'required',
            'doctor' => 'required',
        ]);

        $newFinalDiagnosis = FinalDiagnosis::find($id);
        $newFinalDiagnosis->dateOfTreatment = $request->input('dateOfTreatment');
        $newFinalDiagnosis->finalDiagnosis = $request->input('finalDiagnosis');
        $newFinalDiagnosis->firstTimeDiagnosed = $request->input('firstTimeDiagnosed');
        $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $request->input('firstTimeDiagnosedOnProphylaxis');
        $newFinalDiagnosis->doctor = $request->input('doctor');
        $newFinalDiagnosis->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finalDiagnosis = FinalDiagnosis::find($id);
        $finalDiagnosis->delete();
        redirect('/patients');
    }
}
