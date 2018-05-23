<?php

namespace App\Http\Controllers;

use App\Models\PeriodicHealthExamination;
use Illuminate\Http\Request;
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
            echo 'You can not create periodic health examination';
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
                'nameOfExamination' => 'required',
                'cabinetNumber' => 'required',
                'dateOfExamination' => 'required',
            ]);

            $newHealthExamination = new PeriodicHealthExamination();
            $newHealthExamination->patient_id = $patientID;
            $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
            $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
            $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
            $newHealthExamination->save();
        } else {
            echo 'You can not store periodic health examination';
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
        //TODO Maybe delete this?
        $periodicHealthExaminations = PeriodicHealthExamination::where('patient_id', $id)->get();
        return view('periodicHealthExaminations.periodicHealthExaminations')->with(['periodicHealthExaminations' => $periodicHealthExaminations, 'patientID' => $id]);
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
            echo 'You can not edit periodic health examination';
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
                'nameOfExamination' => 'required',
                'cabinetNumber' => 'required',
                'dateOfExamination' => 'required',
            ]);
            $newHealthExamination = PeriodicHealthExamination::find($id);
            $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
            $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
            $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
            $newHealthExamination->save();
        } else {
            echo 'You can not update periodic health examination';
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
            return 'Info about health examination deleted';
        } else {
            echo 'You can not destroy periodic health examination';
        }
    }
}
