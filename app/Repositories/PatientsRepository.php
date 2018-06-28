<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 14:50
 */

namespace App\Repositories;

use App\Models\Patient;

class PatientsRepository implements IPatientRepository
{
    protected $patient;

    /**
     * PatientsRepository constructor.
     * @param Patient $patient
     */
    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function getAllPatients()
    {
        return $this->patient->all();
    }

    public function savePatient(array $data)
    {
        $newPatient = new Patient();
        $newPatient->name = $data['name'];
        $newPatient->surname = $data['surname'];
        $newPatient->patronymic = $data['patronymic'];
        $newPatient->gender = $data['gender'];
        $newPatient->bdate = $data['bdate'];
        $newPatient->homePhoneNumber = $data['homePhoneNumber'];
        $newPatient->workPhoneNumber = $data['workPhoneNumber'];
        $newPatient->address = $data['address'];
        $newPatient->placeOfWorkAndPosition = $data['placeOfWorkAndPosition'];
        $newPatient->dispensaryGroup = ($data['dispensaryGroup'] == 1 ? true : false);
        $newPatient->contingent = array_key_exists('contingent', $data) == true  ? $data['contingent'] : null;
        $newPatient->PrivilegeCertificateID = $data['PrivilegeCertificateID'];
        $newPatient->bloodType = $data['bloodType'];
        $newPatient->rh = ($data['rh'] == 1 ? true : false);
        $newPatient->diabetes = $data['diabetes'];
        $newPatient->save();

        /*$this->patient->name = $data('name');
        $this->patient->surname = $data('surname');
        $this->patient->patronymic = $data('patronymic');
        $this->patient->gender = $data('gender');
        $this->patient->bdate = $data('bdate');
        $this->patient->homePhoneNumber = $data('homePhoneNumber');
        $this->patient->workPhoneNumber = $data('workPhoneNumber');
        $this->patient->address = $data('address');
        $this->patient->placeOfWorkAndPosition = $data('placeOfWorkAndPosition');
        $this->patient->dispensaryGroup = ($data('dispensaryGroup') == 1 ? true : false);
        $this->patient->contingent = $data('contingent');
        $this->patient->PrivilegeCertificateID = $data('PrivilegeCertificateID');
        $this->patient->bloodType = $data('bloodType');
        $this->patient->rh = ($data('rh') == 1 ? true : false);
        $this->patient->diabetes = $data('diabetes');
        $this->patient->save();*/
    }

    public function updatePatient(array $data, $id)
    {
        $patient = Patient::find($id);
        $patient->name = $data['name'];
        $patient->surname = $data['surname'];
        $patient->patronymic = $data['patronymic'];
        $patient->gender = $data['gender'];
        $patient->bdate = $data['bdate'];
        $patient->homePhoneNumber = $data['homePhoneNumber'];
        $patient->workPhoneNumber = $data['workPhoneNumber'];
        $patient->address = $data['address'];
        $patient->placeOfWorkAndPosition = $data['placeOfWorkAndPosition'];
        $patient->dispensaryGroup = ($data['dispensaryGroup'] == 1 ? true : false);
        $patient->contingent = array_key_exists('contingent', $data) == true  ? $data['contingent'] : null;
        $patient->PrivilegeCertificateID = $data['PrivilegeCertificateID'];
        $patient->bloodType = $data['bloodType'];
        $patient->rh = ($data['rh'] == 1 ? true : false);
        $patient->diabetes = $data['diabetes'];
        $patient->save();
    }

    public function deletePatient($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
    }

    public function findPatientById($id)
    {
        return Patient::find($id);
    }

    public function setUserId($patientId, $userId)
    {
        $patient = Patient::find($patientId);
        $patient->user_id = $userId;
        $patient->save();
    }

    public function findPatientByName($name)
    {
        return Patient::search($name)->get();
    }
}