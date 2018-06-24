<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFinalDiagnosis;
use App\Models\FinalDiagnosis;
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
            return redirect('/')->with('error', 'You can not create final diagnosis');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateFinalDiagnosis  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFinalDiagnosis $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newFinalDiagnosis = new FinalDiagnosis();
            $newFinalDiagnosis->patient_id = $patientID;
            $newFinalDiagnosis->dateOfTreatment = $request->input('dateOfTreatment');
            $newFinalDiagnosis->finalDiagnosis = $request->input('finalDiagnosis');
            $newFinalDiagnosis->firstTimeDiagnosed = $request->input('firstTimeDiagnosed');
            $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $request->input('firstTimeDiagnosedOnProphylaxis');
            $newFinalDiagnosis->doctor = $request->input('doctor');
            $newFinalDiagnosis->save();

            return redirect()->route('patient.finalDiagnosis.index', ['patient' => $patientID])->with('success', 'Додано новий заключний діагноз');
        } else {
            return redirect('/')->with('error', 'You can not store final diagnosis');
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
        //
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
            return redirect('/')->with('error', 'You can not edit final diagnosis');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateFinalDiagnosis  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFinalDiagnosis $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newFinalDiagnosis = FinalDiagnosis::find($id);
            $newFinalDiagnosis->dateOfTreatment = $request->input('dateOfTreatment');
            $newFinalDiagnosis->finalDiagnosis = $request->input('finalDiagnosis');
            $newFinalDiagnosis->firstTimeDiagnosed = $request->input('firstTimeDiagnosed');
            $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $request->input('firstTimeDiagnosedOnProphylaxis');
            $newFinalDiagnosis->doctor = $request->input('doctor');
            $newFinalDiagnosis->save();
            return redirect()->route('patient.finalDiagnosis.index', ['patient' => $patientID])->with('success', 'Оновлено заключний діагноз');
        } else {
            return redirect('/')->with('error', 'You can not update final diagnosis');
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
            return redirect()->route('patient.finalDiagnosis.index', ['patient' => $patientID])->with('success', 'Заключний діагноз видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy final diagnosis');
        }
    }
}
