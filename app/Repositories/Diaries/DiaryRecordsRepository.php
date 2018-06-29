<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 13:55
 */

namespace App\Repositories\Diaries;

use App\Models\Diary;

class DiaryRecordsRepository implements IDiaryRecordsRepository
{

    public function getAllDiaryRecordsOfPatient($patientId)
    {
        return Diary::where('patient_id', $patientId)->get();
    }

    public function getDiaryRecordById($recordId)
    {
        return Diary::find($recordId);
    }

    public function saveDiaryRecord(array $data, $patientId)
    {
        $newRecord = new Diary();
        $newRecord->patient_id = $patientId;
        $newRecord->appealDate = $data['appealDate'];
        $newRecord->placeOfTreatment = $data['placeOfTreatment'];
        $newRecord->treatmentData = $data['treatmentData'];
        $newRecord->treatment = $data['treatment'];
        $newRecord->doctor = $data['doctor'];
        $newRecord->save();
    }

    public function updateDiaryRecord(array $data, $recordId)
    {
        $record = Diary::find($recordId);
        $record->appealDate = $data['appealDate'];
        $record->placeOfTreatment = $data['placeOfTreatment'];
        $record->treatmentData = $data['treatmentData'];
        $record->treatment = $data['treatment'];
        $record->doctor = $data['doctor'];
        $record->save();
    }

    public function deleteDiaryRecord($recordId)
    {
        $record = Diary::find($recordId);
        $record->delete();
    }
}