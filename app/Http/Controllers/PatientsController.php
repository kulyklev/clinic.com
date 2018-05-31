<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Gate;

class PatientsController extends Controller
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
        //TODO definitely use policies instead of gates
        if (Gate::allows('create-update-delete-actions')) {
            $patients = Patient::all();
            return view('patients.listOfPatient')->with('patients', $patients);
        } else {
            return redirect('/')->with('error', 'You can not view all patients');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-update-delete-actions')) {
            return view('patients.registerPatient');
        } else {
            return redirect('/')->with('error', 'You can not create patient');
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
            $this->validate($request, [//TODO improve validation
                'name' => 'required',
                'surname' => 'required',
                'patronymic' => 'required',
                'gender' => 'required',
                'bdate' => 'required',
                'homePhoneNumber' => 'required',
                'workPhoneNumber' => 'required',
                'address' => 'required',
                'placeOfWorkAndPosition' => 'required',
                'dispensaryGroup' => 'required|boolean'
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
            $newPatient->dispensaryGroup = ($request->input('dispensaryGroup') == 1 ? true : false);
            $newPatient->contingent = $request->input('contingent');
            $newPatient->PrivilegeCertificateID = $request->input('PrivilegeCertificateID');
            $newPatient->bloodType = $request->input('bloodType');
            $newPatient->rh = ($request->input('rh') == 1 ? true : false);
            $newPatient->diabetes = $request->input('diabetes');
            $newPatient->save();
            return redirect()->route('patient.index')->with('success', 'Додано нового пацієнта');
        } else {
            return redirect('/')->with('error', 'You can not store patient');
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
        if(auth()->user()->isDoctor){
            $patient = Patient::find($id);
            return view('patients.patient')->with('patient', $patient);
        }
        else{
            //TODO Patient can change patientID in url and associate himself with other patient
            $patient = Patient::find($id);
            return view('patients.patient')->with('patient', $patient);
        }
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
            $patient = Patient::find($id);
            return view('patients.editPatient')->with('patient', $patient);
        } else {
            return redirect('/')->with('error', 'You can not edit patient');
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
            $newPatient->dispensaryGroup = ($request->input('dispensaryGroup') == 1 ? true : false);
            $newPatient->contingent = $request->input('contingent');
            $newPatient->PrivilegeCertificateID = $request->input('PrivilegeCertificateID');
            $newPatient->bloodType = $request->input('bloodType');
            $newPatient->rh = ($request->input('rh') == 1 ? true : false);
            $newPatient->diabetes = $request->input('diabetes');
            $newPatient->save();
            redirect('/');
            return redirect()->route('patient.index')->with('success', 'Пацієнта оновлено');
        } else {
            return redirect('/')->with('error', 'You can not update patient');
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
            $patient = Patient::find($id);
            $patient->delete();
            return redirect()->route('patient.index')->with('success', 'Пацієнта видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy patient');
        }
    }

    /**
     * Set user_id to patient.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setUserId(Request $request)
    {
        $this->validate($request, [
            'patientID' => 'required|numeric',
        ]);

        $patient = Patient::find($request->input('patientID'));
        if($patient != null){
            $patient->user_id = auth()->user()->id;
            $patient->save();
            return redirect()->route('patient.show', ['patient' => $patient->id])->with('success', 'Ви війшли до своєї персональної сторінки');
        }
        else{
            return redirect('/')->with('error', 'Не існує такого номера пацієнта');
        }
    }
}
