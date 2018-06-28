<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 20:31
 */

namespace App\Repositories;

interface IAllergicHistoryRepository {
    public function getAllAllergicHistoriesOfPatient($patientId);

    public function getAllergicHistoryById($allergicHistoryId);

    public function savePatientAllergicHistory(array $data, $patientId);

    public function updatePatientAllergicHistory(array $data, $historyId);

    public function deletePatientAllergicHistory($historyId);
}