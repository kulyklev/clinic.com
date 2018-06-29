<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEpicrisisAnnual;
use App\Repositories\EpicrisisAnnualRepo\IEpicrisisAnnualRepository;
use Illuminate\Support\Facades\Gate;

class EpicrisisAnnualController extends Controller
{
    protected $epicrisisAnnual;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\EpicrisisAnnualRepo\IEpicrisisAnnualRepository $epicrisisAnnual
     * @return void
     */
    public function __construct(IEpicrisisAnnualRepository $epicrisisAnnual)
    {
        $this->middleware('auth');
        $this->epicrisisAnnual = $epicrisisAnnual;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $epicrisisAnnual = $this->epicrisisAnnual->getAllEpicrisisAnnualOfPatient($patientID);
        return view('annualEpicrisis.annualEpicrisis')->with(['epicrisisAnnual' => $epicrisisAnnual, 'patientID' => $patientID]);
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
            return view('annualEpicrisis.registerAnnualepicrisis')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create annual epicrisis');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEpicrisisAnnual  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEpicrisisAnnual $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->epicrisisAnnual->saveEpicrisisAnnual($request->input(), $patientID);
            return redirect()->route('patient.annualEpicrisis.index', ['patient' => $patientID])->with('success', 'Додано новий щорічний епікриз');
        } else {
            return redirect('/')->with('error', 'You can not store annual epicrisis');
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
            $epicrisisAnnual = $this->epicrisisAnnual->getEpicrisisAnnualById($id);
            return view('annualEpicrisis.editAnnualEpicrisis')->with(['patientID' => $patientID,  'epicrisisAnnual' => $epicrisisAnnual]);
        } else {
            return redirect('/')->with('error', 'You can not edit annual epicrisis');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEpicrisisAnnual  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEpicrisisAnnual $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->epicrisisAnnual->updateEpicrisisAnnual($request->input(), $id);
            return redirect()->route('patient.annualEpicrisis.index', ['patient' => $patientID])->with('success', 'Оновлено щорічний епікриз');
        } else {
            return redirect('/')->with('error', 'You can not update annual epicrisis');
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
            $this->epicrisisAnnual->deleteEpicrisisAnnual($id);
            return redirect()->route('patient.annualEpicrisis.index', ['patient' => $patientID])->with('success', 'Видалено щорічний епікриз');
        } else {
            return redirect('/')->with('error', 'You can not destroy annual epicrisis');
        }
    }
}
