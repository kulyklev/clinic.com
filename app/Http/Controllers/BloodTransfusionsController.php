<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBloodTransfusions;
use App\Repositories\BloodTransfusions\IBloodTransfusionsRepository;
use Illuminate\Support\Facades\Gate;


class BloodTransfusionsController extends Controller
{
    protected $bloodTransfusionsRepository;
    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\BloodTransfusions\IBloodTransfusionsRepository $bloodTransfusionsRepository
     * @return void
     */
    public function __construct(IBloodTransfusionsRepository $bloodTransfusionsRepository)
    {
        $this->middleware('auth');
        $this->bloodTransfusionsRepository = $bloodTransfusionsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $bloodTransfusions = $this->bloodTransfusionsRepository->getAllBloodTransfusionsOfPatient($patientID);
        return view('bloodTransfusions.bloodTransfusions')->with(['patientID' => $patientID, 'bloodTransfusions' => $bloodTransfusions]);
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
            return view('bloodTransfusions.registerTransfusion')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create blood transfusion');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBloodTransfusions  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateBloodTransfusions $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->bloodTransfusionsRepository->saveBloodTransfusion($request->input(), $patientID);
            return redirect()->route('patient.bloodTransfusions.index', ['patient' => $patientID])->with('success', 'Додано нове переливання крові');
        } else {
            return redirect('/')->with('error', 'You can not store blood transfusion');
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
            $bloodTransfusion = $this->bloodTransfusionsRepository->getBloodTransfusionById($id);
            return view('bloodTransfusions.editBloodTransfusion')->with(['patientID' => $patientID, 'bloodTransfusion' => $bloodTransfusion ]);
        } else {
            return redirect('/')->with('error', 'You can not edit blood transfusion');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBloodTransfusions  $request
     * @param  int  $id
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateBloodTransfusions $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->bloodTransfusionsRepository->updateBloodTransfusion($request->input(), $id);
            return redirect()->route('patient.bloodTransfusions.index', ['patient' => $patientID])->with('success', 'Переливання крові змінено');
        } else {
            return redirect('/')->with('error', 'You can not update blood transfusion');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws
     *
     * @param  int  $id
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function destroy($patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->bloodTransfusionsRepository->deleteBloodTransfusion($id);
            return redirect()->route('patient.bloodTransfusions.index', ['patient' => $patientID])->with('success', 'Переливання крові видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy blood transfusion');
        }
    }
}
