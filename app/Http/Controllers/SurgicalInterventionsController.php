<?php

namespace App\Http\Controllers;

use App\Models\SurgicalIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SurgicalInterventionsController extends Controller
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
        $surgeryList = SurgicalIntervention::where('patient_id', $patientID)->get();
        return view('listsOfSurgicalInterventions.surgery')->with(['surgeryList' => $surgeryList, 'patientID' => $patientID]);
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
            return view('listsOfSurgicalInterventions.registerSurgery')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create surgery');
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
                'operationName' => 'required',
                'operationDate' => 'required',
            ]);

            $newSurgery = new SurgicalIntervention();
            $newSurgery->patient_id = $patientID;
            $newSurgery->operationName = $request->input('operationName');
            $newSurgery->operationDate = $request->input('operationDate');
            $newSurgery->save();
            return redirect()->route('patient.surgicalInterventions.index', ['patient' => $patientID])->with('success', 'Операцію зареєстровано');
        } else {
            return redirect('/')->with('error', 'You can not store surgery');
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
            $surgery = SurgicalIntervention::find($id);
            return view('listsOfSurgicalInterventions.editSurgery')->with(['patientID' => $patientID, 'surgery' => $surgery]);
        } else {
            return redirect('/')->with('error', 'You can not edit surgery');
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
                'operationName' => 'required',
                'operationDate' => 'required',
            ]);

            $newSurgery = SurgicalIntervention::find($id);
            $newSurgery->operationName = $request->input('operationName');
            $newSurgery->operationDate = $request->input('operationDate');
            $newSurgery->save();
            return redirect()->route('patient.surgicalInterventions.index', ['patient' => $patientID])->with('success', 'Операцію оновлено');
        } else {
            return redirect('/')->with('error', 'You can not update surgery');
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
            $surgery = SurgicalIntervention::find($id);
            $surgery->delete();
            return redirect()->route('patient.surgicalInterventions.index', ['patient' => $patientID])->with('success', 'Операцію видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy surgery');
        }
    }
}
