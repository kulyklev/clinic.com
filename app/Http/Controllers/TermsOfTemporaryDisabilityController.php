<?php

namespace App\Http\Controllers;

use App\Models\TermsOfTemporaryDisability;
use Illuminate\Http\Request;

class TermsOfTemporaryDisabilityController extends Controller
{
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
        //TODO I need to pass patientID somehow
        return view('termsOfTemporaryDisability.registerTerm');
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
            'openingDate' => 'required',
            'closingDate' => 'required',
            'finalDiagnosis' => 'required',
            'doctor' => 'required',
        ]);

        $newTerm = new TermsOfTemporaryDisability();
        $newTerm->patient_id = $request->input('patient_id');
        $newTerm->openingDate = $request->input('openingDate');
        $newTerm->closingDate = $request->input('closingDate');
        $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
        $newTerm->doctor = $request->input('doctor');
        $newTerm->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $termsOfTemporaryDisability = TermsOfTemporaryDisability::where('patient_id', $id)->get();
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
        $termOfTemporaryDisability = TermsOfTemporaryDisability::find($id);
        return view('termsOfTemporaryDisability.editTerm')->with('termOfTemporaryDisability', $termOfTemporaryDisability);
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
            'openingDate' => 'required',
            'closingDate' => 'required',
            'finalDiagnosis' => 'required',
            'doctor' => 'required',
        ]);

        $newTerm = TermsOfTemporaryDisability::find($id);
        $newTerm->openingDate = $request->input('openingDate');
        $newTerm->closingDate = $request->input('closingDate');
        $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
        $newTerm->doctor = $request->input('doctor');
        $newTerm->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termOfTemporaryDisability = TermsOfTemporaryDisability::find($id);
        $termOfTemporaryDisability->delete();
        return 'Info about term of temporary disability deleted';
    }
}
