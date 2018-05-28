<?php

namespace App\Http\Controllers;

use App\Models\VaccinationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VaccinationController extends Controller
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
        $vaccinationData = VaccinationData::where('patient_id', $patientID)->get();
        return view('vaccinationData.vaccination')->with(['vaccinationData' => $vaccinationData, 'patientID' => $patientID]);
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
            return view('vaccinationData.registerVaccination')->with(['patientID' => $patientID]);
        } else {
            return redirect('/')->with('error', 'You can not create vaccination');
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
                'vaccinationName' => 'required',
                'vaccinationType' => 'required',
                'vaccinationDate' => 'required',
                'age' => 'required',
                'dose' => 'required',
                'series' => 'required',
                'nameOfTheDrug' => 'required',
                'methodOfInput' => 'required',
            ]);

            $newVaccinationData = new VaccinationData();
            $newVaccinationData->patient_id = $patientID;
            $newVaccinationData->vaccinationName = $request->input('vaccinationName');
            $newVaccinationData->vaccinationType = $request->input('vaccinationType');
            $newVaccinationData->vaccinationDate = $request->input('vaccinationDate');
            $newVaccinationData->age = $request->input('age');
            $newVaccinationData->dose = $request->input('dose');
            $newVaccinationData->series = $request->input('series');
            $newVaccinationData->nameOfTheDrug = $request->input('nameOfTheDrug');
            $newVaccinationData->methodOfInput = $request->input('methodOfInput');
            $newVaccinationData->localReaction = $request->input('localReaction');
            $newVaccinationData->globalReaction = $request->input('globalReaction');
            $newVaccinationData->medicalContraindications = $request->input('medicalContraindications');
            $newVaccinationData->save();

            return redirect()->route('patient.vaccination.index', ['patient' => $patientID])->with('success', 'Додано нову вакцинацію');
        } else {
            return redirect('/')->with('error', 'You can not store vaccination');
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
            $vaccinationData = VaccinationData::find($id);
            return view('vaccinationData.editVaccination')->with(['patientID' => $patientID, 'vaccinationData' => $vaccinationData ]);
        } else {
            return redirect('/')->with('error', 'You can not edit vaccination');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $patientID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patientID, $id)
    {
        if (Gate::allows('create-update-delete-actions')) {
            $this->validate($request, [
                'vaccinationName' => 'required',
                'vaccinationType' => 'required',
                'vaccinationDate' => 'required',
                'age' => 'required',
                'dose' => 'required',
                'series' => 'required',
                'nameOfTheDrug' => 'required',
                'methodOfInput' => 'required',
            ]);

            $newVaccinationData = VaccinationData::find($id);
            $newVaccinationData->vaccinationName = $request->input('vaccinationName');
            $newVaccinationData->vaccinationType = $request->input('vaccinationType');
            $newVaccinationData->vaccinationDate = $request->input('vaccinationDate');
            $newVaccinationData->age = $request->input('age');
            $newVaccinationData->dose = $request->input('dose');
            $newVaccinationData->series = $request->input('series');
            $newVaccinationData->nameOfTheDrug = $request->input('nameOfTheDrug');
            $newVaccinationData->methodOfInput = $request->input('methodOfInput');
            $newVaccinationData->localReaction = $request->input('localReaction');
            $newVaccinationData->globalReaction = $request->input('globalReaction');
            $newVaccinationData->medicalContraindications = $request->input('medicalContraindications');
            $newVaccinationData->save();

            return redirect()->route('patient.vaccination.index', ['patient' => $patientID])->with('success', 'Оновлено вакцинацію');
        } else {
            return redirect('/')->with('error', 'You can not update vaccination');
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
            $vaccinationData = VaccinationData::find($id);
            $vaccinationData->delete();
            return redirect()->route('patient.vaccination.index', ['patient' => $patientID])->with('success', 'Вакцинацію видалено');
        } else {
            return redirect('/')->with('error', 'You can not destroy vaccination');
        }
    }
}
