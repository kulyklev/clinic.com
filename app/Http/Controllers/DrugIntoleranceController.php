<?php

namespace App\Http\Controllers;

use App\Models\DrugIntolerance;
use Illuminate\Http\Request;

class DrugIntoleranceController extends Controller
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
        return view('drugIntolerance.registerDrugIntolerance');
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
            'drugName' => 'required',
        ]);

        $newDrugIntolerance = new DrugIntolerance();
        $newDrugIntolerance->patient_id = $request->input('patient_id');
        $newDrugIntolerance->drugName = $request->input('drugName');
        $newDrugIntolerance->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drugList = DrugIntolerance::where('patient_id', $id)->get();
        return view('drugIntolerance.drugIntoleranceList')->with(['drugList' => $drugList, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = DrugIntolerance::find($id);
        return view('drugIntolerance.editDrugIntolerance')->with('drug', $drug);
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
            'drugName' => 'required',
        ]);

        $newDrugIntolerance = DrugIntolerance::find($id);
        $newDrugIntolerance->drugName = $request->input('drugName');
        $newDrugIntolerance->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drug = DrugIntolerance::find($id);
        $drug->delete();
        return 'Info about drug deleted';
    }
}
