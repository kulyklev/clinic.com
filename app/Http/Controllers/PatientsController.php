<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPatient;
use App\Http\Requests\SetUserIdToPatient;
use App\Http\Requests\StoreUpdatePatients;
use App\Repositories\Patients\IPatientsRepository;
use Illuminate\Support\Facades\Gate;

class PatientsController extends Controller
{
    protected $patient = null;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\Patients\IPatientsRepository $patient
     * @return void
     */
    public function __construct(IPatientsRepository $patient)
    {
        $this->middleware('auth');
        $this->patient = $patient;
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
            $patients = $this->patient->getAllPatients();
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
     * @param  \App\Http\Requests\StoreUpdatePatients  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePatients $request)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->patient->savePatient($request->input());
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
            $patient = $this->patient->findPatientById($id);
            return view('patients.patient')->with('patient', $patient);
        }
        else{
            //TODO Patient can change patientID in url and associate himself with other patient
            $patient = $this->patient->findPatientById($id);
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
            $patient = $this->patient->findPatientById($id);
            return view('patients.editPatient')->with('patient', $patient);
        } else {
            return redirect('/')->with('error', 'You can not edit patient');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePatients  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePatients $request, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->patient->updatePatient($request->input(), $id);
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
            $this->patient->deletePatient($id);
            return redirect()->route('patient.index')->with('success', 'Пацієнта видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy patient');
        }
    }

    /**
     * Set user_id to patient.
     *
     * @param  \App\Http\Requests\SetUserIdToPatient  $request
     * @return \Illuminate\Http\Response
     */
    public function setUserId(SetUserIdToPatient $request)
    {
        //TODO Maybe refactor this. Query to DB -> business logic -> query to DB. Is it OK?
        $patient = $this->patient->findPatientById($request->input('patientID'));

        if($patient != null){
            $this->patient->setUserId($patient->id, auth()->user()->id);
            return redirect()->route('patient.show', ['patient' => $patient->id])->with('success', 'Ви війшли до своєї персональної сторінки');
        }
        else{
            return redirect('/')->with('error', 'Не існує такого номера пацієнта');
        }
    }

    /**
     * Search patient by his name, surname and patronymic.
     *
     * @param  \App\Http\Requests\SearchPatient  $request
     * @return \Illuminate\Http\Response
     */
    public function searchPatient(SearchPatient $request){
        if (Gate::allows('create-update-delete-actions')) {
            $patient = $this->patient->findPatientByName($request->input('searchPatient'));

            if($patient != null)
                return view('patients.listOfPatient')->with('patients', $patient);
            else
                return redirect()->route('patient.index')->with('error', 'Пацієнта не здайдено.');
        } else {
            return redirect('/')->with('error', 'You can not search patients!');
        }
    }
}
