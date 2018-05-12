<?php

namespace App\Http\Controllers;

use App\Models\BloodTransfusion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BloodTransfusionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('patients')
            ->join('blood_transfusions', 'patients.id', '=', 'blood_transfusions.patient_id')
            ->select('patients.id', 'patients.name', 'patients.surname', 'patients.patronymic', 'blood_transfusions.transfusionDate', 'blood_transfusions.volume')
            ->get();

        return view('bloodTransfusions.listOfTransfusions')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('bloodTransfusions.registerTransfusion')->with('patientID', $request->input('patientID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO How to pass patientID from bloodTranfiusion.blade.php to registerBloodTranfusion.blade.php?
        $this->validate($request, [
            'id' => 'required',
            'transfusionDate' => 'required',
            'volume' => 'required',
        ]);

        $newBloodTransfusion = new BloodTransfusion();
        $newBloodTransfusion->patient_id = $request->input('id');
        $newBloodTransfusion->transfusionDate = $request->input('transfusionDate');
        $newBloodTransfusion->volume = $request->input('volume');
        $newBloodTransfusion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloodTransfusions = BloodTransfusion::where('patient_id', $id)->get();
        return view('bloodTransfusions.bloodTransfusion')->with(['bloodTransfusions' => $bloodTransfusions, 'patientID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodTransfusions = BloodTransfusion::find($id);
        return view('bloodTransfusions.editBloodTransfusion')->with('bloodTransfusions', $bloodTransfusions);
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
            'transfusionDate' => 'required',
            'volume' => 'required',
        ]);

        $newBloodTransfusion = BloodTransfusion::find($id);
        $newBloodTransfusion->transfusionDate = $request->input('transfusionDate');
        $newBloodTransfusion->volume = $request->input('volume');
        $newBloodTransfusion->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bloodTransfusion = BloodTransfusion::find($id);
       $bloodTransfusion->delete();
       return 'Info about bloodTransfusion deleted';
    }
}
