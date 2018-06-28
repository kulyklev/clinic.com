<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 22:03
 */

namespace App\Repositories\BloodTransfusions;

interface IBloodTransfusionsRepository{
    public function getAllBloodTransfusionsOfPatient($patientId);

    public function getBloodTransfusionById($bloodTransfusionId);

    public function saveBloodTransfusion(array $data, $patientId);

    public function updateBloodTransfusion(array $data, $bloodTransfusionId);

    public function deleteBloodTransfusion($bloodTransfusionId);
}