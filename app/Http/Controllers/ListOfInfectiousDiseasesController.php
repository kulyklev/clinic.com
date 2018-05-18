<?php

namespace App\Http\Controllers;

use App\Models\ListOfInfectiousDiseases;
use Illuminate\Http\Request;

class ListOfInfectiousDiseasesController extends Controller
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
        return view('listsOfInfectiousDiseases.registerInfectiousDisease');
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
            'diseaseName' => 'required',
        ]);

        $newInfectiousDisease = new ListOfInfectiousDiseases();
        $newInfectiousDisease->patient_id = $request->input('patient_id');
        $newInfectiousDisease->diseaseName = $request->input('diseaseName');
        $newInfectiousDisease->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listOfInfectiousDiseases = ListOfInfectiousDiseases::where('patient_id', $id)->get();
        return view('listsOfInfectiousDiseases.list')->with(['listOfInfectiousDiseases' => $listOfInfectiousDiseases, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infectiousDisease = ListOfInfectiousDiseases::find($id);
        return view('listsOfInfectiousDiseases.editInfectiousDisease')->with('infectiousDisease', $infectiousDisease);
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
            'diseaseName' => 'required',
        ]);

        $newInfectiousDisease = ListOfInfectiousDiseases::find($id);
        $newInfectiousDisease->diseaseName = $request->input('diseaseName');
        $newInfectiousDisease->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infectiousDisease = ListOfInfectiousDiseases::find($id);
        $infectiousDisease->delete();
        return 'Info about infectious disease deleted';
    }
}
