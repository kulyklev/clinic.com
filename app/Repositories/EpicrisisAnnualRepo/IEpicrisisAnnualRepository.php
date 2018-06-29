<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 16:49
 */

namespace App\Repositories\EpicrisisAnnualRepo;

interface IEpicrisisAnnualRepository{
    public function getAllEpicrisisAnnualOfPatient($patientId);

    public function getEpicrisisAnnualById($epicrisisAnnualId);

    public function saveEpicrisisAnnual(array $data, $patientId);

    public function updateEpicrisisAnnual(array $data, $epicrisisAnnualId);

    public function deleteEpicrisisAnnual($epicrisisAnnualId);
}