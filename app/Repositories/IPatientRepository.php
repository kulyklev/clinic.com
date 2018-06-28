<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 14:02
 */

namespace App\Repositories;

interface IPatientRepository {
    public function getAllPatients();

    public function findPatientById($id);

    public function savePatient(array $data);

    public function updatePatient(array $data, $id);

    public function deletePatient($id);

    public function setUserId($patientId, $userId);

    public function findPatientByName($name);
}