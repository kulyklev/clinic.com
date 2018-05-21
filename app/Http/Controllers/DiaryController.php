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
            return view('diaries.newRecord');
        } else {
            echo 'You can not create dairy';
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
                'appealDate' => 'required',
                'placeOfTreatment' => 'required',
                'treatmentData' => 'required',
                'treatment' => 'required',
                'doctor' => 'required',
            ]);
            $newRecord = new Diary();
            $newRecord->patient_id = $request->input('patient_id');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $record = Diary::find($id);
            return view('diaries.editRecord')->with('record', $record);
        } else {
            echo 'You can not edit dairy';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
