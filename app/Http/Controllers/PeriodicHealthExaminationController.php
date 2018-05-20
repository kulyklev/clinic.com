<?php

namespace App\Http\Controllers;

use App\Models\PeriodicHealthExamination;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO Delete index()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO I need to pass patientID somehow
        return view('periodicHealthExaminations.registerHealthExamination');
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
            'nameOfExamination' => 'required',
            'cabinetNumber' => 'required',
            'dateOfExamination' => 'required',
        ]);

        $newHealthExamination = new PeriodicHealthExamination();
        $newHealthExamination->patient_id = $request->input('patient_id');
        $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
        $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
        $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
        $newHealthExamination->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periodicHealthExaminations = PeriodicHealthExamination::where('patient_id', $id)->get();
        return view('periodicHealthExaminations.periodicHealthExaminations')->with(['periodicHealthExaminations' => $periodicHealthExaminations, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodicHealthExamination = PeriodicHealthExamination::find($id);
        return view('periodicHealthExaminations.editHealthExamination')->with('periodicHealthExamination', $periodicHealthExamination);
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
            'nameOfExamination' => 'required',
            'cabinetNumber' => 'required',
            'dateOfExamination' => 'required',
        ]);

        $newHealthExamination = PeriodicHealthExamination::find($id);
        $newHealthExamination->nameOfExamination = $request->input('nameOfExamination');
        $newHealthExamination->cabinetNumber = $request->input('cabinetNumber');
        $newHealthExamination->dateOfExamination = $request->input('dateOfExamination');
        $newHealthExamination->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $healthExamination = PeriodicHealthExamination::find($id);
        $healthExamination->delete();
        return 'Info about health examination deleted';
    }
}
