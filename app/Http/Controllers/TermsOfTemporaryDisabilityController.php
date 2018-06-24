<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTermsOfTemporaryDisability;
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
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function index($patientID)
    {
        $termsOfTemporaryDisability = TermOfTemporaryDisability::where('patient_id', $patientID)->get();
        return view('termsOfTemporaryDisability.terms')->with(['termsOfTemporaryDisability' => $termsOfTemporaryDisability, 'patientID' => $patientID]);
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
            return view('termsOfTemporaryDisability.registerTerm')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create term of temporary disability');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $patientID
     * @param  \App\Http\Requests\StoreUpdateTermsOfTemporaryDisability  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTermsOfTemporaryDisability $request, $patientID)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newTerm = new TermOfTemporaryDisability();
            $newTerm->patient_id = $patientID;
            $newTerm->openingDate = $request->input('openingDate');
            $newTerm->closingDate = $request->input('closingDate');
            $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
            $newTerm->doctor = $request->input('doctor');
            $newTerm->save();

            return redirect()->route('patient.termsOfTemporaryDisability.index', ['patient' => $patientID])->with('success', 'Додано новий строк тимчасовой нерпацездатності');
        } else {
            return redirect('/')->with('error', 'You can not store term of temporary disability');
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
            $termOfTemporaryDisability = TermOfTemporaryDisability::find($id);
            return view('termsOfTemporaryDisability.editTerm')->with(['patientID' => $patientID, 'termOfTemporaryDisability' => $termOfTemporaryDisability]);
        } else {
            return redirect('/')->with('error', 'You can not edit term of temporary disability');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTermsOfTemporaryDisability  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTermsOfTemporaryDisability $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $newTerm = TermOfTemporaryDisability::find($id);
            $newTerm->openingDate = $request->input('openingDate');
            $newTerm->closingDate = $request->input('closingDate');
            $newTerm->finalDiagnosis = $request->input('finalDiagnosis');
            $newTerm->doctor = $request->input('doctor');
            $newTerm->save();

            return redirect()->route('patient.termsOfTemporaryDisability.index', ['patient' => $patientID])->with('success', 'Оновлено строк тимчасовой нерпацездатності');
        } else {
            return redirect('/')->with('error', 'You can not update term of temporary disability');
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
            $termOfTemporaryDisability = TermOfTemporaryDisability::find($id);
            $termOfTemporaryDisability->delete();
            return redirect()->route('patient.termsOfTemporaryDisability.index', ['patient' => $patientID])->with('success', 'Видалено строк тимчасовой нерпацездатності');
        } else {
            return redirect('/')->with('error', 'You can not destroy term of temporary disability');
        }
    }
}
