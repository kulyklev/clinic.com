<?php

namespace App\Http\Controllers;

use App\Models\ListOfSurgicalInterventions;
use Illuminate\Http\Request;

class ListOfSurgicalInterventionsController extends Controller
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
        return view('listsOfSurgicalInterventions.registerSurgery');
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
            'operationName' => 'required',
            'operationDate' => 'required',
        ]);

        $newSurgery = new ListOfSurgicalInterventions();
        $newSurgery->patient_id = $request->input('patient_id');
        $newSurgery->operationName = $request->input('operationName');
        $newSurgery->operationDate = $request->input('operationDate');
        $newSurgery->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surgeryList = ListOfSurgicalInterventions::where('patient_id', $id)->get();
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
        $surgery = ListOfSurgicalInterventions::find($id);
        return view('listsOfSurgicalInterventions.editSurgery')->with('surgery', $surgery);
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
            'operationName' => 'required',
            'operationDate' => 'required',
        ]);

        $newSurgery = ListOfSurgicalInterventions::find($id);
        $newSurgery->operationName = $request->input('operationName');
        $newSurgery->operationDate = $request->input('operationDate');
        $newSurgery->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surgery = ListOfSurgicalInterventions::find($id);
        $surgery->delete();
        return 'Info about surgery deleted';
    }
}
