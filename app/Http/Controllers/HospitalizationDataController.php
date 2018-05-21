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
        if (Gate::allows('create-update-delete-actions')) {//TODO pass patient id
            return view('hospitalizationData.registerHospitalization');
        } else {
            echo 'You can not create hospitalization data';
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
                'hospitalizationDate' => 'required',
                'medicalFacilityName' => 'required',
                'departmentName' => 'required',
                'finalDiagnosis' => 'required',
            ]);
            $newHospitalizationData = new HospitalizationData();
            $newHospitalizationData->patient_id = $request->input('patient_id');
            $newHospitalizationData->hospitalizationDate = $request->input('hospitalizationDate');
            $newHospitalizationData->medicalFacilityName = $request->input('medicalFacilityName');
            $newHospitalizationData->departmentName = $request->input('departmentName');
            $newHospitalizationData->finalDiagnosis = $request->input('finalDiagnosis');
            $newHospitalizationData->save();
        } else {
            echo 'You can not store hospitalization data';
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
        $hospitalizationData = HospitalizationData::where('patient_id', $id)->get();
        return view('hospitalizationData.hospitalizationData')->with(['hospitalizationData' => $hospitalizationData, 'patientID' => $id]);
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
            $hospitalizationData = HospitalizationData::find($id);
            return view('hospitalizationData.editHospitalisationData')->with('hospitalizationData', $hospitalizationData);
        } else {
            echo 'You can not edit hospitalization data';
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
        } else {
            echo 'You can not update hospitalization data';
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
            $hospitalizationData = HospitalizationData::find($id);
            $hospitalizationData->delete();
            return 'Info about hospitalization deleted';
        } else {
            echo 'You can not destroy hospitalization data';
        }
    }
}
