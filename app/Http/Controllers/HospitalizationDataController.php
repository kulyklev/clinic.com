<?php

namespace App\Http\Controllers;

use App\Models\HospitalizationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HospitalizationDataController extends Controller
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
        $hospitalizationData = HospitalizationData::where('patient_id', $patientID)->get();
        return view('hospitalizationData.hospitalizationData')->with(['hospitalizationData' => $hospitalizationData, 'patientID' => $patientID]);
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
            return view('hospitalizationData.registerHospitalization')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create hospitalization data');
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
                'hospitalizationDate' => 'required',
                'medicalFacilityName' => 'required',
                'departmentName' => 'required',
                'finalDiagnosis' => 'required',
            ]);

            $newHospitalizationData = new HospitalizationData();
            $newHospitalizationData->patient_id = $patientID;
            $newHospitalizationData->hospitalizationDate = $request->input('hospitalizationDate');
            $newHospitalizationData->medicalFacilityName = $request->input('medicalFacilityName');
            $newHospitalizationData->departmentName = $request->input('departmentName');
            $newHospitalizationData->finalDiagnosis = $request->input('finalDiagnosis');
            $newHospitalizationData->save();

            return redirect()->route('patient.hospitalizationData.index', ['patient' => $patientID])->with('success', 'Додано нову інформацію про госпіталзацію');
        } else {
            return redirect('/')->with('error', 'You can not store hospitalization data');
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
            $hospitalizationData = HospitalizationData::find($id);
            return view('hospitalizationData.editHospitalisationData')->with(['patientID' => $patientID, 'hospitalizationData' => $hospitalizationData]);
        } else {
            return redirect('/')->with('error', 'You can not edit hospitalization data');
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
                'hospitalizationDate' => 'required',
                'medicalFacilityName' => 'required',
                'departmentName' => 'required',
                'finalDiagnosis' => 'required',
            ]);

            $newHospitalizationData = HospitalizationData::find($id);
            $newHospitalizationData->hospitalizationDate = $request->input('hospitalizationDate');
            $newHospitalizationData->medicalFacilityName = $request->input('medicalFacilityName');
            $newHospitalizationData->departmentName = $request->input('departmentName');
            $newHospitalizationData->finalDiagnosis = $request->input('finalDiagnosis');
            $newHospitalizationData->save();

            return redirect()->route('patient.hospitalizationData.index', ['patient' => $patientID])->with('success', 'Оновлено інформацію про госпіталзацію');
        } else {
            return redirect('/')->with('error', 'You can not update hospitalization data');
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
            $hospitalizationData = HospitalizationData::find($id);
            $hospitalizationData->delete();
            return redirect()->route('patient.hospitalizationData.index', ['patient' => $patientID])->with('success', 'Видалено інформацію про госпіталзацію');
        } else {
            return redirect('/')->with('error', 'You can not destroy hospitalization data');
        }
    }
}
