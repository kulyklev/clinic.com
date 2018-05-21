<?php

namespace App\Http\Controllers;

use App\Models\TermOfTemporaryDisability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TermsOfTemporaryDisabilityController extends Controller
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
            return view('termsOfTemporaryDisability.registerTerm');
        } else {
            echo 'You can not create term of temporary disability';
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
                'openingDate' => 'required',
                'closingDate' => 'required',
                'finalDiagnosis' => 'required',
                'doctor' => 'required',
            ]);
            $newTerm = new TermOfTemporaryDisability();
            $newTerm->patient_id = $request->input('patient_id');
            $newTerm->openingDate = $request->input('openingDate');
            $newTerm->closingDate = $request->input('closingDate');
            $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
            $newTerm->doctor = $request->input('doctor');
            $newTerm->save();
        } else {
            echo 'You can not store term of temporary disability';
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
        $termsOfTemporaryDisability = TermOfTemporaryDisability::where('patient_id', $id)->get();
        return view('termsOfTemporaryDisability.terms')->with(['termsOfTemporaryDisability' => $termsOfTemporaryDisability, 'patientID' => $id]);
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
            $termOfTemporaryDisability = TermOfTemporaryDisability::find($id);
            return view('termsOfTemporaryDisability.editTerm')->with('termOfTemporaryDisability', $termOfTemporaryDisability);
        } else {
            echo 'You can not edit term of temporary disability';
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
                'openingDate' => 'required',
                'closingDate' => 'required',
                'finalDiagnosis' => 'required',
                'doctor' => 'required',
            ]);
            $newTerm = TermOfTemporaryDisability::find($id);
            $newTerm->openingDate = $request->input('openingDate');
            $newTerm->closingDate = $request->input('closingDate');
            $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
            $newTerm->doctor = $request->input('doctor');
            $newTerm->save();
        } else {
            echo 'You can not update term of temporary disability';
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
            $termOfTemporaryDisability = TermOfTemporaryDisability::find($id);
            $termOfTemporaryDisability->delete();
            return 'Info about term of temporary disability deleted';
        } else {
            echo 'You can not destroy term of temporary disability';
        }
    }
}
