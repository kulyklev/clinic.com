<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDiary;
use App\Repositories\Diaries\IDiariesRepository;
use Illuminate\Support\Facades\Gate;

class DiaryRecordsController extends Controller
{
    protected $diary;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\Diaries\IDiariesRepository $diary
     * @return void
     */
    public function __construct(IDiariesRepository $diary)
    {
        $this->middleware('auth');
        $this->diary = $diary;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $diary = $this->diary->getAllDiaryRecordsOfPatient($patientID);
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
            return redirect('/')->with('error', 'You can not create dairy');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDiary  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDiary $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->diary->saveDiaryRecord($request->input(), $patientID);
            return redirect()->route('patient.diaries.index', ['patient' => $patientID])->with('success', 'Додано новий запис до щоденнику');
        } else {
            return redirect('/')->with('error', 'You can not store dairy');
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
        $diary = $this->diary->getDiaryRecordById($id);
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
            $record = $this->diary->getDiaryRecordById($id);
            return view('diaries.editRecord')->with(['patientID' => $patientID, 'record' => $record]);
        } else {
            return redirect('/')->with('error', 'You can not edit dairy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDiary  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDiary $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->diary->updateDiaryRecord($request->input(), $id);
            return redirect()->route('patient.diaries.index', ['patient' => $patientID])->with('success', 'Оновлено запис у щоденнику');
        } else {
            return redirect('/')->with('error', 'You can not update dairy');
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
            $this->diary->deleteDiaryRecord($id);
            return redirect()->route('patient.diaries.index', ['patient' => $patientID])->with('success', 'Видалено запис у щоденнику');
        } else {
            return redirect('/')->with('error', 'You can not destroy dairy');
        }
    }
}
