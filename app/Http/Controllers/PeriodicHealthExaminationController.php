<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePeriodicHealthExamination;
use App\Models\PeriodicHealthExamination;
use Illuminate\Support\Facades\Gate;

class PeriodicHealthExaminationController extends Controller
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
        $periodicHealthExaminations = PeriodicHealthExamination::where('patient_id', $patientID)->get();
        return view('periodicHealthExaminations.periodicHealthExaminations')->with(['periodicHealthExaminations' => $periodicHealthExaminations, 'patientID' => $patientID]);
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
            return view('periodicHealthExaminations.registerHealthExamination')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create periodic health examination');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePeriodicHealthExamination  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePeriodicHealthExamination $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newHealthExamination = new PeriodicHealthExamination();
            $newHealthExamination->patient_id = $patientID;
            $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
            $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
            $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
            $newHealthExamination->save();
            return redirect()->route('patient.periodicHealthExaminations.index', ['patient' => $patientID])->with('success', 'Додано новий запис профілактичного огляду');
        } else {
            return redirect('/')->with('error', 'You can not store periodic health examination');
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
            $periodicHealthExamination = PeriodicHealthExamination::find($id);
            return view('periodicHealthExaminations.editHealthExamination')->with(['patientID' => $patientID, 'periodicHealthExamination' => $periodicHealthExamination]);
        } else {
            return redirect('/')->with('error', 'You can not edit periodic health examination');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePeriodicHealthExamination  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePeriodicHealthExamination $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newHealthExamination = PeriodicHealthExamination::find($id);
            $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
            $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
            $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
            $newHealthExamination->save();
            return redirect()->route('patient.periodicHealthExaminations.index', ['patient' => $patientID])->with('success', 'Оновлено запис профілактичного огляду');
        } else {
            return redirect('/')->with('error', 'You can not update periodic health examination');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws ??
     *
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $healthExamination = PeriodicHealthExamination::find($id);
            $healthExamination->delete();
            return redirect()->route('patient.periodicHealthExaminations.index', ['patient' => $patientID])->with('success', 'Профілактичного огляд діагноз видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy periodic health examination');
        }
    }
}
