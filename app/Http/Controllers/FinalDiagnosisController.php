<?php

namespace App\Http\Controllers;

use App\Models\FinalDiagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
     * @param  int  $patientId
     * @return \Illuminate\Http\Response
     */
    public function index($patientId)
    {
        $finalDiagnosis = FinalDiagnosis::where('patient_id', $patientId)->get();
        return view('finalDiagnosis.listOfFinalDiagnosis')->with(['patientID' => $patientId, 'finalDiagnosis' => $finalDiagnosis]);
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
            return view('finalDiagnosis.registerDiagnosis')->with(['patientID' => $patientID]);
        } else {
            echo 'You can not create final diagnosis';
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
        if (Gate::allows('create-update-delete-actions')) {//TODO Validation doesn`t pass while bool fields are false
            $this->validate($request, [
                'dateOfTreatment' => 'required',
                'finalDiagnosis' => 'required',
                'firstTimeDiagnosed' => 'required',
                'firstTimeDiagnosedOnProphylaxis' => 'required',
                'doctor' => 'required',
            ]);

            $newFinalDiagnosis = new FinalDiagnosis();
            $newFinalDiagnosis->patient_id = $patientID;
            $newFinalDiagnosis->dateOfTreatment = $request->input('dateOfTreatment');
            $newFinalDiagnosis->finalDiagnosis = $request->input('finalDiagnosis');
            $newFinalDiagnosis->firstTimeDiagnosed = $request->input('firstTimeDiagnosed');
            $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $request->input('firstTimeDiagnosedOnProphylaxis');
            $newFinalDiagnosis->doctor = $request->input('doctor');
            $newFinalDiagnosis->save();
        } else {
            echo 'You can not store final diagnosis';
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
        //TODO What all show functions need to do? Do I need to show data about one diagnose?
        $finalDiagnosis = FinalDiagnosis::where('patient_id', $id)->get();
        return view('finalDiagnosis.listOfFinalDiagnosis')->with(['finalDiagnosis' => $finalDiagnosis, 'patientID' => $id]);
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
            $finalDiagnosis = FinalDiagnosis::find($id);
            return view('finalDiagnosis.editFinalDiagnosis')->with(['patientID' => $patientID, 'finalDiagnosis' => $finalDiagnosis]);
        } else {
            echo 'You can not edit final diagnosis';
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
        if (Gate::allows('create-update-delete-actions')) {//TODO Validation doesn`t pass while bool fields are false
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
        } else {
            echo 'You can not update final diagnosis';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws
     *
     * @param  int  $id
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $finalDiagnosis = FinalDiagnosis::find($id);
            $finalDiagnosis->delete();
            redirect('/patients');
        } else {
            echo 'You can not destroy final diagnosis';
        }
    }
}
