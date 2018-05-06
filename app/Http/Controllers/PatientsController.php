<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('listOfPatient')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerPatient');
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
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'gender' => 'required',
            'bdate' => 'required',
            'homePhoneNumber' => 'required',
            'workPhoneNumber' => 'required',
            'address' => 'required',
            'placeOfWorkAndPosition' => 'required',
            'dispensaryGroup' => 'required'
        ]);

        $newPatient = new Patient();

        $newPatient->name = $request->input('name');
        $newPatient->surname = $request->input('surname');
        $newPatient->patronymic = $request->input('patronymic');
        $newPatient->gender = $request->input('gender');
        $newPatient->bdate = $request->input('bdate');
        $newPatient->homePhoneNumber = $request->input('homePhoneNumber');
        $newPatient->workPhoneNumber = $request->input('workPhoneNumber');
        $newPatient->address = $request->input('address');
        $newPatient->placeOfWorkAndPosition = $request->input('placeOfWorkAndPosition');
        $newPatient->dispensaryGroup = $request->input('dispensaryGroup');
        $newPatient->save();
        redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patient')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('editPatient')->with('patient', $patient);
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
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'gender' => 'required',
            'bdate' => 'required',
            'homePhoneNumber' => 'required',
            'workPhoneNumber' => 'required',
            'address' => 'required',
            'placeOfWorkAndPosition' => 'required',
            'dispensaryGroup' => 'required'
        ]);

        $newPatient = Patient::find($id);

        $newPatient->name = $request->input('name');
        $newPatient->surname = $request->input('surname');
        $newPatient->patronymic = $request->input('patronymic');
        $newPatient->gender = $request->input('gender');
        $newPatient->bdate = $request->input('bdate');
        $newPatient->homePhoneNumber = $request->input('homePhoneNumber');
        $newPatient->workPhoneNumber = $request->input('workPhoneNumber');
        $newPatient->address = $request->input('address');
        $newPatient->placeOfWorkAndPosition = $request->input('placeOfWorkAndPosition');
        $newPatient->dispensaryGroup = $request->input('dispensaryGroup');
        $newPatient->save();
        redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return 'Patient deleted';
    }
}
