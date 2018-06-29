<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 13:53
 */

namespace App\Repositories\Diaries;

interface IDiariesRepository{
    public function getAllDiaryRecordsOfPatient($recordId);

    public function getDiaryRecordById($recordId);

    public function saveDiaryRecord(array $data, $patientId);

    public function updateDiaryRecord(array $data, $recordId);

    public function deleteDiaryRecord($recordId);
}
