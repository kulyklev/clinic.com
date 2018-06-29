<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateHospitalizationData;
use App\Models\HospitalizationData;
use App\Repositories\HospitalizationDatum\IHospitalizationDatumRepository;
use Illuminate\Support\Facades\Gate;

class HospitalizationDataController extends Controller
{
    protected $hospitalizationDatum;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\HospitalizationDatum\IHospitalizationDatumRepository $hospitalizationDatum
     * @return void
     */
    public function __construct(IHospitalizationDatumRepository $hospitalizationDatum)
    {
        $this->middleware('auth');
        $this->hospitalizationDatum = $hospitalizationDatum;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $hospitalizationData = $this->hospitalizationDatum->getAllHospitalizationDatumOfPatient($patientID);
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
     * @param  \App\Http\Requests\StoreUpdateHospitalizationData  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateHospitalizationData $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->hospitalizationDatum->saveHospitalizationData($request->input(), $patientID);
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
            $hospitalizationData = $this->hospitalizationDatum->getHospitalizationDataById($id);
            return view('hospitalizationData.editHospitalisationData')->with(['patientID' => $patientID, 'hospitalizationData' => $hospitalizationData]);
        } else {
            return redirect('/')->with('error', 'You can not edit hospitalization data');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateHospitalizationData  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateHospitalizationData $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->hospitalizationDatum->updateHospitalizationData($request->input(), $id);
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
            $this->hospitalizationDatum->deleteHospitalizationData($id);
            return redirect()->route('patient.hospitalizationData.index', ['patient' => $patientID])->with('success', 'Видалено інформацію про госпіталзацію');
        } else {
            return redirect('/')->with('error', 'You can not destroy hospitalization data');
        }
    }
}
