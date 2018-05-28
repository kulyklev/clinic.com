<?php

namespace App\Http\Controllers;

use App\Models\BloodTransfusion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class BloodTransfusionsController extends Controller
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
        $bloodTransfusions = BloodTransfusion::where('patient_id', $patientID)->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->validate($request, [
                'transfusionDate' => 'required',
                'volume' => 'required',
            ]);
            $newBloodTransfusion = new BloodTransfusion();
            $newBloodTransfusion->patient_id = $patientID;
            $newBloodTransfusion->transfusionDate = $request->input('transfusionDate');
            $newBloodTransfusion->volume = $request->input('volume');
            $newBloodTransfusion->save();

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
            $bloodTransfusion = BloodTransfusion::find($id);
            return view('bloodTransfusions.editBloodTransfusion')->with(['patientID' => $patientID, 'bloodTransfusion' => $bloodTransfusion ]);
        } else {
            return redirect('/')->with('error', 'You can not store blood transfusion');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->validate($request, [
                'transfusionDate' => 'required',
                'volume' => 'required',
            ]);
            $newBloodTransfusion = BloodTransfusion::find($id);
            $newBloodTransfusion->transfusionDate = $request->input('transfusionDate');
            $newBloodTransfusion->volume = $request->input('volume');
            $newBloodTransfusion->save();
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
            $bloodTransfusion = BloodTransfusion::find($id);
            $bloodTransfusion->delete();
            return redirect()->route('patient.bloodTransfusions.index', ['patient' => $patientID])->with('success', 'Переливання крові видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy blood transfusion');
        }
    }
}
