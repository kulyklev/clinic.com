<?php

namespace App\Http\Controllers;

use App\Models\InfectiousDisease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListOfInfectiousDiseasesController extends Controller
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
            return view('listsOfInfectiousDiseases.registerInfectiousDisease');
        } else {
            echo 'You can not create infectious disease';
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
                'diseaseName' => 'required',
            ]);
            $newInfectiousDisease = new InfectiousDisease();
            $newInfectiousDisease->patient_id = $request->input('patient_id');
            $newInfectiousDisease->diseaseName = $request->input('diseaseName');
            $newInfectiousDisease->save();
        } else {
            echo 'You can not store infectious disease';
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
        $listOfInfectiousDiseases = InfectiousDisease::where('patient_id', $id)->get();
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
        if (Gate::allows('create-update-delete-actions')) {
            $infectiousDisease = InfectiousDisease::find($id);
            return view('listsOfInfectiousDiseases.editInfectiousDisease')->with('infectiousDisease', $infectiousDisease);
        } else {
            echo 'You can not edit infectious disease';
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
                'diseaseName' => 'required',
            ]);
            $newInfectiousDisease = InfectiousDisease::find($id);
            $newInfectiousDisease->diseaseName = $request->input('diseaseName');
            $newInfectiousDisease->save();
        } else {
            echo 'You can not update infectious disease';
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
            $infectiousDisease = InfectiousDisease::find($id);
            $infectiousDisease->delete();
            return 'Info about infectious disease deleted';
        } else {
            echo 'You can not destroy infectious disease';
        }
    }
}
