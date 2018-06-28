<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 20:32
 */

namespace App\Repositories\AllergicHistories;


use App\Models\AllergicHistory;

class AllergicHistoriesRepository implements IAllergicHistoriesRepository
{
    protected $allergicHistory;

    public function __construct(AllergicHistory $allergicHistory)
    {
        $this->allergicHistory = $allergicHistory;
    }

    public function getAllAllergicHistoriesOfPatient($patientId)
    {
        return AllergicHistory::where('patient_id', $patientId)->get();
    }

    public function getAllergicHistoryById($allergicHistoryId)
    {
        return AllergicHistory::find($allergicHistoryId);
    }

    public function savePatientAllergicHistory(array $data, $patientId)
    {
        $newAllergy = new AllergicHistory();
        $newAllergy->patient_id = $patientId;
        $newAllergy->allergyName = $data['allergyName'];
        $newAllergy->save();
    }

    public function updatePatientAllergicHistory(array $data, $historyId)
    {
        $allergy = AllergicHistory::find($historyId);
        $allergy->allergyName = $data['allergyName'];
        $allergy->save();
    }

    public function deletePatientAllergicHistory($historyId)
    {
        $allergy = AllergicHistory::find($historyId);
        $allergy->delete();
    }
}