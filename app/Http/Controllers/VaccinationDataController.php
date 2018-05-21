<?php

namespace App\Http\Controllers;

use App\Models\VaccinationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VaccinationDataController extends Controller
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
        if (Gate::allows('create-update-delete-actions')) {//TODO I need to pass patientID somehow
            return view('vaccinationData.registerVaccination');
        } else {
            echo 'You can not create vaccination';
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
                'vaccinationName' => 'required',
                'vaccinationType' => 'required',
                'vaccinationDate' => 'required',
                'age' => 'required',
                'dose' => 'required',
                'series' => 'required',
                'nameOfTheDrug' => 'required',
                'methodOfInput' => 'required',
            ]);
            $newVaccinationData = new VaccinationData();
            $newVaccinationData->patient_id = $request->input('patient_id');
            $newVaccinationData->vaccinationName = $request->input('vaccinationName');
            $newVaccinationData->vaccinationType = $request->input('vaccinationType');
            $newVaccinationData->vaccinationDate = $request->input('vaccinationDate');
            $newVaccinationData->age = $request->input('age');
            $newVaccinationData->dose = $request->input('dose');
            $newVaccinationData->series = $request->input('series');
            $newVaccinationData->nameOfTheDrug = $request->input('nameOfTheDrug');
            $newVaccinationData->methodOfInput = $request->input('methodOfInput');
            $newVaccinationData->localReaction = $request->input('localReaction');
            $newVaccinationData->globalReaction = $request->input('globalReaction');
            $newVaccinationData->medicalContraindications = $request->input('medicalContraindications');
            $newVaccinationData->save();
        } else {
            echo 'You can not store vaccination';
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
        $vaccinationData = VaccinationData::where('patient_id', $id)->get();
        return view('vaccinationData.vaccination')->with(['vaccinationData' => $vaccinationData, 'patientID' => $id]);
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
            $vaccinationData = VaccinationData::find($id);
            return view('vaccinationData.editVaccination')->with('vaccinationData', $vaccinationData);
        } else {
            echo 'You can not edit vaccination';
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
                'vaccinationName' => 'required',
                'vaccinationType' => 'required',
                'vaccinationDate' => 'required',
                'age' => 'required',
                'dose' => 'required',
                'series' => 'required',
                'nameOfTheDrug' => 'required',
                'methodOfInput' => 'required',
            ]);
            $newVaccinationData = VaccinationData::find($id);
            $newVaccinationData->vaccinationName = $request->input('vaccinationName');
            $newVaccinationData->vaccinationType = $request->input('vaccinationType');
            $newVaccinationData->vaccinationDate = $request->input('vaccinationDate');
            $newVaccinationData->age = $request->input('age');
            $newVaccinationData->dose = $request->input('dose');
            $newVaccinationData->series = $request->input('series');
            $newVaccinationData->nameOfTheDrug = $request->input('nameOfTheDrug');
            $newVaccinationData->methodOfInput = $request->input('methodOfInput');
            $newVaccinationData->localReaction = $request->input('localReaction');
            $newVaccinationData->globalReaction = $request->input('globalReaction');
            $newVaccinationData->medicalContraindications = $request->input('medicalContraindications');
            $newVaccinationData->save();
        } else {
            echo 'You can not update vaccination';
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
            $vaccinationData = VaccinationData::find($id);
            $vaccinationData->delete();
            return 'Info about vaccination deleted';
        } else {
            echo 'You can not destroy vaccination';
        }
    }
}
