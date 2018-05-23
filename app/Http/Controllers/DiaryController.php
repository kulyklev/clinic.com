<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DiaryController extends Controller
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
        $diary = Diary::where('patient_id', $patientID)->get();
        return view('diaries.diary')->with(['diary' => $diary, 'patientID' => $patientID]);
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
            return view('diaries.newRecord')->with(['patientID' => $patientID]);
        } else {
            echo 'You can not create dairy';
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
                'appealDate' => 'required',
                'placeOfTreatment' => 'required',
                'treatmentData' => 'required',
                'treatment' => 'required',
                'doctor' => 'required',
            ]);

            $newRecord = new Diary();
            $newRecord->patient_id = $patientID;
            $newRecord->appealDate = $request->input('appealDate');
            $newRecord->placeOfTreatment = $request->input('placeOfTreatment');
            $newRecord->treatmentData = $request->input('treatmentData');
            $newRecord->treatment = $request->input('treatment');
            $newRecord->doctor = $request->input('doctor');
            $newRecord->save();
        } else {
            echo 'You can not store dairy';
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
        $diary = Diary::where('patient_id', $id)->get();
        return view('diaries.diary')->with(['diary' => $diary, 'patientID' => $id]);
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
            $record = Diary::find($id);
            return view('diaries.editRecord')->with(['patientID' => $patientID, 'record' => $record]);
        } else {
            echo 'You can not edit dairy';
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
                'appealDate' => 'required',
                'placeOfTreatment' => 'required',
                'treatmentData' => 'required',
                'treatment' => 'required',
                'doctor' => 'required',
            ]);

            $newRecord = Diary::find($id);
            $newRecord->appealDate = $request->input('appealDate');
            $newRecord->placeOfTreatment = $request->input('placeOfTreatment');
            $newRecord->treatmentData = $request->input('treatmentData');
            $newRecord->treatment = $request->input('treatment');
            $newRecord->doctor = $request->input('doctor');
            $newRecord->save();
        } else {
            echo 'You can not update dairy';
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
            $record = Diary::find($id);
            $record->delete();
            return 'Info about treatment deleted';
        } else {
            echo 'You can not destroy dairy';
        }
    }
}
