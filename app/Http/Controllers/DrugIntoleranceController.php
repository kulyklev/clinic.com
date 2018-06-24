<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDrugIntolerance;
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
            return redirect('/')->with('error', 'You can not create drug intolerance');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDrugIntolerance  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDrugIntolerance $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newDrugIntolerance = new DrugIntolerance();
            $newDrugIntolerance->patient_id = $patientID;
            $newDrugIntolerance->drugName = $request->input('drugName');
            $newDrugIntolerance->save();
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Додана нова непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not store drug intolerance');
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
            $drug = DrugIntolerance::find($id);
            return view('drugIntolerance.editDrugIntolerance')->with(['patientID' => $patientID, 'drug' => $drug]);
        } else {
            return redirect('/')->with('error', 'You can not edit drug intolerance');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDrugIntolerance  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDrugIntolerance $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newDrugIntolerance = DrugIntolerance::find($id);
            $newDrugIntolerance->drugName = $request->input('drugName');
            $newDrugIntolerance->save();
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Оновлена непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not update drug intolerance');
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
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Видалена непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not destroy drug intolerance');
        }
    }
}
