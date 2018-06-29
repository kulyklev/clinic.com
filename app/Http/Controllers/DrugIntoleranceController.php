<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDrugIntolerance;
use App\Repositories\DrugIntolerance\IDrugIntoleranceRepository;
use Illuminate\Support\Facades\Gate;

class DrugIntoleranceController extends Controller
{
    protected $drugIntolerance;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IDrugIntoleranceRepository $drugIntolerance)
    {
        $this->middleware('auth');
        $this->drugIntolerance = $drugIntolerance;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $drugList = $this->drugIntolerance->getAllDrugIntoleranceOfPatient($patientID);
        return view('drugIntolerance.drugIntoleranceList')->with(['drugList' => $drugList, 'patientID' => $patientID]);
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
            return view('drugIntolerance.registerDrugIntolerance')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create drug intolerance');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDrugIntolerance  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDrugIntolerance $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->drugIntolerance->saveDrugIntolerance($request->input(), $patientID);
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Додана нова непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not store drug intolerance');
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
            $drug = $this->drugIntolerance->getDrugIntoleranceById($id);
            return view('drugIntolerance.editDrugIntolerance')->with(['patientID' => $patientID, 'drug' => $drug]);
        } else {
            return redirect('/')->with('error', 'You can not edit drug intolerance');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDrugIntolerance  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDrugIntolerance $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->drugIntolerance->updateDrugIntolerance($request->input(), $id);
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Оновлена непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not update drug intolerance');
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
            $this->drugIntolerance->deleteDrugIntolerance($id);
            return redirect()->route('patient.drugIntolerance.index', ['patient' => $patientID])->with('success', 'Видалена непереносимість до ліків');
        } else {
            return redirect('/')->with('error', 'You can not destroy drug intolerance');
        }
    }
}
