<?php

namespace App\Http\Controllers;

use App\Models\InfectiousDisease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InfectiousDiseasesController extends Controller
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
        $listOfInfectiousDiseases = InfectiousDisease::where('patient_id', $patientID)->get();
        return view('listsOfInfectiousDiseases.list')->with(['listOfInfectiousDiseases' => $listOfInfectiousDiseases, 'patientID' => $patientID]);
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
            return view('listsOfInfectiousDiseases.registerInfectiousDisease')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create infectious disease');
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
                'diseaseName' => 'required',
            ]);

            $newInfectiousDisease = new InfectiousDisease();
            $newInfectiousDisease->patient_id = $patientID;
            $newInfectiousDisease->diseaseName = $request->input('diseaseName');
            $newInfectiousDisease->save();
            return redirect()->route('patient.infectiousDiseases.index', ['patient' => $patientID])->with('success', 'Додано нове інфекційне захворювання');
        } else {
            return redirect('/')->with('error', 'You can not store infectious disease');
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
            $infectiousDisease = InfectiousDisease::find($id);
            return view('listsOfInfectiousDiseases.editInfectiousDisease')->with(['patientID' => $patientID, 'infectiousDisease' => $infectiousDisease]);
        } else {
            return redirect('/')->with('error', 'You can not edit infectious disease');
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
                'diseaseName' => 'required',
            ]);

            $newInfectiousDisease = InfectiousDisease::find($id);
            $newInfectiousDisease->diseaseName = $request->input('diseaseName');
            $newInfectiousDisease->save();
            return redirect()->route('patient.infectiousDiseases.index', ['patient' => $patientID])->with('success', 'Оновлено інфекційне захворювання');
        } else {
            return redirect('/')->with('error', 'You can not update infectious disease');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws
     *
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $infectiousDisease = InfectiousDisease::find($id);
            $infectiousDisease->delete();
            return redirect()->route('patient.infectiousDiseases.index', ['patient' => $patientID])->with('success', 'Інфекційне захворювання видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy infectious disease');
        }
    }
}
