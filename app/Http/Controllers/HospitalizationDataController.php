<?php

namespace App\Http\Controllers;

use App\Models\HospitalizationData;
use Illuminate\Http\Request;

class HospitalizationDataController extends Controller
{
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
        //
        return view('hospitalizationData.registerHospitalization');
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
        $hospitalizationData = HospitalizationData::find($id);
        return view('hospitalizationData.editHospitalisationData')->with('hospitalizationData', $hospitalizationData);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospitalizationData = HospitalizationData::find($id);
        $hospitalizationData->delete();
        return 'Info about hospitalization deleted';
    }
}
