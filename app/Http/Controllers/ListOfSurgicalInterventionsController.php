<?php

namespace App\Http\Controllers;

use App\Models\SurgicalIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListOfSurgicalInterventionsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-update-delete-actions')) {//TODO I need to pass patientID somehow
            return view('listsOfSurgicalInterventions.registerSurgery');
        } else {
            echo 'You can not create surgery';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->validate($request, [
                'patient_id' => 'required',
                'operationName' => 'required',
                'operationDate' => 'required',
            ]);
            $newSurgery = new SurgicalIntervention();
            $newSurgery->patient_id = $request->input('patient_id');
            $newSurgery->operationName = $request->input('operationName');
            $newSurgery->operationDate = $request->input('operationDate');
            $newSurgery->save();
        } else {
            echo 'You can not store surgery';
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
        $surgeryList = SurgicalIntervention::where('patient_id', $id)->get();
        return view('listsOfSurgicalInterventions.surgery')->with(['surgeryList' => $surgeryList, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $surgery = SurgicalIntervention::find($id);
            return view('listsOfSurgicalInterventions.editSurgery')->with('surgery', $surgery);
        } else {
            echo 'You can not edit surgery';
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
        if (Gate::allows('create-update-delete-actions')) {
            $this->validate($request, [
                'operationName' => 'required',
                'operationDate' => 'required',
            ]);
            $newSurgery = SurgicalIntervention::find($id);
            $newSurgery->operationName = $request->input('operationName');
            $newSurgery->operationDate = $request->input('operationDate');
            $newSurgery->save();
        } else {
            echo 'You can not update surgery';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $surgery = SurgicalIntervention::find($id);
            $surgery->delete();
            return 'Info about surgery deleted';
        } else {
            echo 'You can not destroy surgery';
        }
    }
}
