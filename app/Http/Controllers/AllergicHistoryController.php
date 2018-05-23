<?php

namespace App\Http\Controllers;

use App\Models\AllergicHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AllergicHistoryController extends Controller
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
        $allergiesList = AllergicHistory::where('patient_id', $patientID)->get();
        return view('allergicHistories.history')->with(['allergiesList' => $allergiesList, 'patientID' => $patientID]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $patientID
     * @return \Illuminate\Http\Response
     */
    public function create($patientID)
    {
        if(Gate::allows('create-update-delete-actions')){
            return view('allergicHistories.registerAllergy')->with(['patientID' => $patientID]);
        }
        else
            echo 'You can not create allergic history';
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
                'allergyName' => 'required',
            ]);

            $newAllergy = new AllergicHistory();
            $newAllergy->patient_id = $patientID;
            $newAllergy->allergyName = $request->input('allergyName');
            $newAllergy->save();
        }
        else
            echo 'You can not store allergic history';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allergiesList = AllergicHistory::where('patient_id', $id)->get();
        return view('allergicHistories.history')->with(['allergiesList' => $allergiesList, 'patientID' => $id]);
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
            $allergy = AllergicHistory::find($id);
            return view('allergicHistories.editAllergy')->with(['patientID' => $patientID, 'allergy' => $allergy]);
        } else {
            echo 'You can not edit allergic history';
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
                'allergyName' => 'required',
            ]);
            $newAllergy = AllergicHistory::find($id);
            $newAllergy->allergyName = $request->input('allergyName');
            $newAllergy->save();
        } else {
            echo 'You can not update allergic history';
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
            $allergy = AllergicHistory::find($id);
            $allergy->delete();
            return 'Info about allergy deleted';
        } else {
            echo 'You can not destroy allergic history';
        }
    }
}
