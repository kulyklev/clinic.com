<?php

namespace App\Http\Controllers;

use App\Models\DrugIntolerance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DrugIntoleranceController extends Controller
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
        $drugList = DrugIntolerance::where('patient_id', $patientID)->get();
        return view('drugIntolerance.drugIntoleranceList')->with(['drugList' => $drugList, 'patientID' => $patientID]);
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
            return view('drugIntolerance.registerDrugIntolerance')->with(['patientID' => $patientID]);
        } else {
            echo 'You can not create drug intolerance';
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
                'drugName' => 'required',
            ]);

            $newDrugIntolerance = new DrugIntolerance();
            $newDrugIntolerance->patient_id = $patientID;
            $newDrugIntolerance->drugName = $request->input('drugName');
            $newDrugIntolerance->save();
        } else {
            echo 'You can not store drug intolerance';
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
        $drugList = DrugIntolerance::where('patient_id', $id)->get();
        return view('drugIntolerance.drugIntoleranceList')->with(['drugList' => $drugList, 'patientID' => $id]);
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
            $drug = DrugIntolerance::find($id);
            return view('drugIntolerance.editDrugIntolerance')->with(['patientID' => $patientID, 'drug' => $drug]);
        } else {
            echo 'You can not edit drug intolerance';
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
                'drugName' => 'required',
            ]);
            $newDrugIntolerance = DrugIntolerance::find($id);
            $newDrugIntolerance->drugName = $request->input('drugName');
            $newDrugIntolerance->save();
        } else {
            echo 'You can not update drug intolerance';
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
            $drug = DrugIntolerance::find($id);
            $drug->delete();
            return 'Info about drug deleted';
        } else {
            echo 'You can not destroy drug intolerance';
        }
    }
}
