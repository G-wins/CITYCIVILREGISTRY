<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBirthCertificate;
use App\Models\AppointmentMarriageCertificate;
use App\Models\AppointmentMarriageLicense;
use App\Models\AppointmentDeathCertificate;
use App\Models\AppointmentCenomar;
use App\Models\AppointmentOtherDocument;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        // Siguraduhin na tama ang pagkuha ng data
        $birthCertificates = AppointmentBirthCertificate::all()->map(function ($item) {
            $item->appointment_type = 'Birth Certificate';
            return $item;
        });

        $marriageCertificates = AppointmentMarriageCertificate::all()->map(function ($item) {
            $item->appointment_type = 'Marriage Certificate';
            return $item;
        });

        $marriageLicenses = AppointmentMarriageLicense::all()->map(function ($item) {
            $item->appointment_type = 'Marriage License';
            return $item;
        });

        $deathCertificates = AppointmentDeathCertificate::all()->map(function ($item) {
            $item->appointment_type = 'Death Certificate';
            return $item;
        });

        $cenomars = AppointmentCenomar::all()->map(function ($item) {
            $item->appointment_type = 'Cenomar';
            return $item;
        });

        $otherDocuments = AppointmentOtherDocument::all()->map(function ($item) {
            $item->appointment_type = 'Other Document';
            return $item;
        });

        // Combine all models sa isang collection
        $appointments = (new Collection)
            ->concat($birthCertificates)
            ->concat($marriageCertificates)
            ->concat($marriageLicenses)
            ->concat($deathCertificates)
            ->concat($cenomars)
            ->concat($otherDocuments);

        // I-pass ang data sa dashboard
        return view('dashboard', ['appointments' => $appointments]);
}

public function showBirthForm($id)
    {
    $appointment = AppointmentBirthCertificate::findOrFail($id);

    return response()->json([
        'requester_last_name' => $appointment->requester_last_name,
        'requester_first_name' => $appointment->requester_first_name,
        'requester_middle_name' => $appointment->requester_middle_name,
        'requester_mailing_address' => $appointment->requester_mailing_address,
        'requester_city_municipality' => $appointment->requester_city_municipality,
        'requester_province' => $appointment->requester_province,
        'contact_no' => $appointment->contact_no,
        'requester_sex' => $appointment->requester_sex,
        'requester_age' => $appointment->requester_age,
        'request_type' => $appointment->request_type,
        'certificate_of_conversion' => $appointment->certificate_of_conversion,
        'brn' => $appointment -> brn,
        'child_last_name' => $appointment -> child_last_name,
        'child_first_name' => $appointment -> child_first_name,
        'child_middle_name' => $appointment -> child_middle_name,
        'child_sex' => $appointment -> child_sex,
        'date_of_birth' => $appointment -> date_of_birth,
        'born_abroad' => $appointment -> born_abroad,
        'country' => $appointment -> country,
        'place_of_birth_city_municipality' => $appointment -> place_of_birth_city_municipality,
        'place_of_birth_province' => $appointment -> place_of_birth_province,
        'father_last_name' => $appointment -> father_last_name,
        'father_first_name' => $appointment -> father_first_name,
        'father_middle_name' => $appointment -> father_middle_name,
        'mother_last_name' => $appointment -> mother_last_name,
        'mother_first_name' => $appointment -> mother_first_name,
        'mother_middle_name' => $appointment -> mother_middle_name,
        'purpose' => $appointment->purpose,
        'delayed' => $appointment->delayed,
        'delayed_date' => $appointment->delayed_date,
        'appointment_date' => $appointment->appointment_date,
        'reference_number' => $appointment->reference_number,

    ]);
}

public function updateBirthCertificate(Request $request, $id)
{
    // Fetch the appointment data using findOrFail to ensure the ID exists
    $appointment = AppointmentBirthCertificate::findOrFail($id);

    // Update the appointment with the new data from the request
    $appointment->update([
        'requester_last_name' => $request->input('requester_last_name'),
        'requester_first_name' => $request->input('requester_first_name'),
        'requester_middle_name' => $request->input('requester_middle_name'),
        'requester_mailing_address' => $request->input('requester_mailing_address'),
        'requester_city_municipality' => $request->input('requester_city_municipality'),
        'requester_province' => $request->input('requester_province'),
        'contact_no' => $request->input('contact_no'),
        'requester_sex' => $request->input('requester_sex'),
        'requester_age' => $request->input('requester_age'),
        'request_type' => $request->input('request_type'),
        'certificate_of_conversion' => $request->input('certificate_of_conversion', 0), // Defaults to 0 if not selected
        'brn' => $request->input('brn'),
        'child_last_name' => $request->input('child_last_name'),
        'child_first_name' => $request->input('child_first_name'),
        'child_middle_name' => $request->input('child_middle_name'),
        'child_sex' => $request->input('child_sex'),
        'date_of_birth' => $request->input('date_of_birth'),
        'born_abroad' => $request->has('born_abroad') ? 1 : 0, // Checkbox handling
        'country' => $request->input('country'),
        'place_of_birth_city_municipality' => $request->input('place_of_birth_city_municipality'),
        'place_of_birth_province' => $request->input('place_of_birth_province'),
        'father_last_name' => $request->input('father_last_name'),
        'father_first_name' => $request->input('father_first_name'),
        'father_middle_name' => $request->input('father_middle_name'),
        'mother_last_name' => $request->input('mother_last_name'),
        'mother_first_name' => $request->input('mother_first_name'),
        'mother_middle_name' => $request->input('mother_middle_name'),
        'purpose' => $request->input('purpose'),
        'delayed' => $request->input('delayed', 0), // Defaults to 0 if not selected
        'delayed_date' => $request->input('delayed_date'),
        'appointment_date' => $request->input('appointment_date'),
        'reference_number' => $appointment->reference_number, // Preserve the reference number
    ]);

    // Return a response indicating the update was successful
    return response()->json([
        'message' => 'Appointment details updated successfully',
        'updated_appointment' => $appointment
    ]);
}

public function showMarriageForm($id)
    {
    $appointment = AppointmentMarriageCertificate::findOrFail($id);

    return response()->json([
        'requester_last_name' => $appointment->requester_last_name,
        'requester_first_name' => $appointment->requester_first_name,
        'requester_middle_name' => $appointment->requester_middle_name,
        'requester_mailing_address' => $appointment->requester_mailing_address,
        'requester_city_municipality' => $appointment->requester_city_municipality,
        'requester_province' => $appointment->requester_province,
        'contact_no' => $appointment->contact_no,
        'requester_sex' => $appointment->requester_sex,
        'requester_age' => $appointment->requester_age,
        'request_type' => $appointment->request_type,
        'husband_last_name' => $appointment->husband_last_name,
        'husband_first_name' => $appointment->husband_first_name,
        'husband_middle_name' => $appointment->husband_middle_name,
        'wife_last_name' => $appointment->wife_last_name,
        'wife_first_name' => $appointment->wife_first_name,
        'wife_middle_name' => $appointment->wife_middle_name,
        'date_of_marriage' => $appointment->date_of_marriage,
        'married_abroad' => $appointment->married_abroad,
        'country' => $appointment->country,
        'marriage_city_municipality'  => $appointment->marriage_city_municipality,
        'marriage_province' => $appointment->marriage_province,
        'requesting_party' => $appointment->requesting_party,
        'relationship_to_owner' => $appointment->relationship_to_owner,
        'purpose' => $appointment->purpose,
        'delayed' => $appointment->delayed,
        'delayed_date' => $appointment->delayed_date,
        'appointment_date' => $appointment->appointment_date,
        'reference_number' => $appointment->reference_number,

    ]);
}

public function updateMarriageCertificate(Request $request, $id)
{
    // Fetch the appointment data using findOrFail to ensure the ID exists
    $appointment = AppointmentMarriageCertificate::findOrFail($id);

    // Update the appointment with the new data from the request
    $appointment->update([
        'requester_last_name' => $request->input('requester_last_name'),
        'requester_first_name' => $request->input('requester_first_name'),
        'requester_middle_name' => $request->input('requester_middle_name'),
        'requester_mailing_address' => $request->input('requester_mailing_address'),
        'requester_city_municipality' => $request->input('requester_city_municipality'),
        'requester_province' => $request->input('requester_province'),
        'contact_no' => $request->input('contact_no'),
        'requester_sex' => $request->input('requester_sex'),
        'requester_age' => $request->input('requester_age'),
        'request_type' => $request->input('request_type'),
        'husband_last_name' => $request->input('husband_last_name'),
        'husband_first_name' => $request->input('husband_first_name'),
        'husband_middle_name' => $request->input('husband_middle_name'),
        'wife_last_name' => $request->input('wife_last_name'),
        'wife_first_name' => $request->input('wife_first_name'),
        'wife_middle_name' => $request->input('wife_middle_name'),
        'date_of_marriage' => $request->input('date_of_marriage'),
        'married_abroad' => $request->input('married_abroad') ? 1 : 0,
        'country' => $request->input('country'),
        'marriage_city_municipality'  => $request->input('marriage_city_municipality'),
        'marriage_province' => $request->input('marriage_province'),
        'requesting_party' => $request->input('requesting_party'),
        'relationship_to_owner' => $request->input('relationship_to_owner'),
        'purpose' => $request->input('purpose'),
        'delayed' => $request->input('delayed', 0),
        'delayed_date' => $request->input('delayed_date'),
        'appointment_date' => $request->input('appointment_date'),
        'reference_number' => $request->input('reference_number'),
    ]);

    // Return a response indicating the update was successful
    return response()->json([
        'message' => 'Appointment details updated successfully',
        'updated_appointment' => $appointment
    ]);
}

public function showMarriageLicenseForm($id)
    {
    $appointment = AppointmentMarriageLicense::findOrFail($id);

    return response()->json([
        'requester_last_name' => $appointment->requester_last_name,
        'requester_first_name' => $appointment->requester_first_name,
        'requester_middle_name' => $appointment->requester_middle_name,
        'requester_mailing_address' => $appointment->requester_mailing_address,
        'requester_city_municipality' => $appointment->requester_city_municipality,
        'requester_province' => $appointment->requester_province,
        'contact_no' => $appointment->contact_no,
        'requester_sex' => $appointment->requester_sex,
        'requester_age' => $appointment->requester_age,
        'request_type' => $appointment->request_type,
        'brn' => $appointment->brn,
        'applicant_last_name' => $appointment->applicant_last_name,
        'applicant_first_name' => $appointment->applicant_first_name,
        'applicant_middle_name' => $appointment->applicant_middle_name,
        'spouse_last_name' => $appointment->spouse_last_name,
        'spouse_first_name' => $appointment->spouse_first_name,
        'spouse_middle_name' => $appointment->spouse_middle_name,
        'planned_date_of_marriage' =>  $appointment->planned_date_of_marriage,
        'place_of_marriage' => $appointment->place_of_marriage,
        'requesting_party' => $appointment->requesting_party,
        'relationship_to_owner' => $appointment->relationship_to_owner,
        'purpose' => $appointment->purpose,
        'delayed' => $appointment->delayed,
        'delayed_date' => $appointment->delayed_date,
        'appointment_date' => $appointment->appointment_date,
        'reference_number' => $appointment->reference_number,

    ]);
}

public function updateMarriageLicense(Request $request, $id)
{
    // Fetch the appointment data using findOrFail to ensure the ID exists
    $appointment = AppointmentMarriageLicense::findOrFail($id);

    // Update the appointment with the new data from the request
    $appointment->update([
        'requester_last_name' => $request->input('requester_last_name'),
        'requester_first_name' => $request->input('requester_first_name'),
        'requester_middle_name' => $request->input('requester_middle_name'),
        'requester_mailing_address' => $request->input('requester_mailing_address'),
        'requester_city_municipality' => $request->input('requester_city_municipality'),
        'requester_province' => $request->input('requester_province'),
        'contact_no' => $request->input('contact_no'),
        'requester_sex' => $request->input('requester_sex'),
        'requester_age' => $request->input('requester_age'),
        'request_type' => $request->input('request_type'),
        'brn' => $request->input('brn'),
        'applicant_last_name' => $request->input('applicant_last_name'),
        'applicant_first_name' => $request->input('applicant_first_name'),
        'applicant_middle_name' => $request->input('applicant_middle_name'),
        'spouse_last_name' => $request->input('spouse_last_name'),
        'spouse_first_name' => $request->input('spouse_first_name'),
        'spouse_middle_name' => $request->input('spouse_middle_name'),
        'planned_date_of_marriage' => $request->input('planned_date_of_marriage'),
        'place_of_marriage' => $request->input('place_of_marriage'),
        'requesting_party' => $request->input('requesting_party'),
        'relationship_to_owner' => $request->input('relationship_to_owner'),
        'purpose' => $request->input('purpose'),
        'delayed' => $request->input('delayed'),
        'delayed_date' => $request->input('delayed_date'),
        'appointment_date' => $request->input('appointment_date'),
        'reference_number' => $request->input('reference_number'),

    ]);

    // Return a response indicating the update was successful
    return response()->json([
        'message' => 'Appointment details updated successfully',
        'updated_appointment' => $appointment
    ]);
}

public function showDeathCertificateForm($id)
    {
    $appointment = AppointmentDeathCertificate::findOrFail($id);

    return response()->json([
        'requester_last_name' => $appointment->requester_last_name,
        'requester_first_name' => $appointment->requester_first_name,
        'requester_middle_name' => $appointment->requester_middle_name,
        'requester_mailing_address' => $appointment->requester_mailing_address,
        'requester_city_municipality' => $appointment->requester_city_municipality,
        'requester_province' => $appointment->requester_province,
        'contact_no' => $appointment->contact_no,
        'requester_sex' => $appointment->requester_sex,
        'requester_age' => $appointment->requester_age,
        'request_type' => $appointment->request_type,
        'brn' => $appointment->brn,
        'deceased_last_name' => $appointment->deceased_last_name,
        'deceased_first_name' => $appointment->deceased_first_name,
        'deceased_middle_name' => $appointment->deceased_middle_name,
        'date_of_death' => $appointment->date_of_death,
        'died_abroad' => $appointment->died_abroad,
        'country' => $appointment->country,
        'death_city_municipality' => $appointment->death_city_municipality,
        'death_province' => $appointment->death_province,
        'requesting_party' => $appointment->requesting_party,
        'relationship_to_owner' => $appointment->relationship_to_owner,
        'purpose' => $appointment->purpose,
        'delayed' => $appointment->delayed,
        'delayed_date' => $appointment->delayed_date,
        'appointment_date' => $appointment->appointment_date,
        'reference_number' => $appointment->reference_number,

    ]);
}

public function updateDeathCertificate(Request $request, $id)
{
    // Fetch the appointment data using findOrFail to ensure the ID exists
    $appointment = AppointmentDeathCertificate::findOrFail($id);

    // Update the appointment with the new data from the request
    $appointment->update([
        'requester_last_name' => $request->input('requester_last_name'),
        'requester_first_name' => $request->input('requester_first_name'),
        'requester_middle_name' => $request->input('requester_middle_name'),
        'requester_mailing_address' => $request->input('requester_mailing_address'),
        'requester_city_municipality' => $request->input('requester_city_municipality'),
        'requester_province' => $request->input('requester_province'),
        'contact_no' => $request->input('contact_no'),
        'requester_sex' => $request->input('requester_sex'),
        'requester_age' => $request->input('requester_age'),
        'request_type' => $request->input('request_type'),
        'brn' => $request->input('brn'),
        'deceased_last_name' => $request->input('deceased_last_name'),
        'deceased_first_name' => $request->input('deceased_first_name'),
        'deceased_middle_name' => $request->input('deceased_middle_name'),
        'date_of_death' => $request->input('date_of_death'),
        'died_abroad' => $request->input('died_abroad') ? 1 : 0,
        'country' => $request->input('country'),
        'death_city_municipality' => $request->input('death_city_municipality'),
        'death_province' => $request->input('death_province'),
        'requesting_party' => $request->input('requesting_party'),
        'relationship_to_owner' => $request->input('relationship_to_owner'),
        'purpose' => $request->input('purpose'),
        'delayed' => $request->input('delayed', 0),
        'delayed_date' => $request->input('delayed_date'),
        'appointment_date' => $request->input('appointment_date'),
        'reference_number' => $request->input('reference_number'),


    ]);

    // Return a response indicating the update was successful
    return response()->json([
        'message' => 'Appointment details updated successfully',
        'updated_appointment' => $appointment
    ]);
}

public function showCenomarForm($id)
    {
    $appointment = AppointmentCenomar::findOrFail($id);

    return response()->json([
        'requester_last_name' => $appointment->requester_last_name,
        'requester_first_name' => $appointment->requester_first_name,
        'requester_middle_name' => $appointment->requester_middle_name,
        'requester_mailing_address' => $appointment->requester_mailing_address,
        'requester_city_municipality' => $appointment->requester_city_municipality,
        'requester_province' => $appointment->requester_province,
        'contact_no' => $appointment->contact_no,
        'requester_sex' => $appointment->requester_sex,
        'requester_age' => $appointment->requester_age,
        'request_type' => $appointment->request_type,
        'brn' => $appointment->brn,
        'person_last_name' => $appointment->person_last_name,
        'person_first_name' => $appointment->person_first_name,
        'person_middle_name' => $appointment->person_middle_name,
        'person_sex' => $appointment->person_sex,
        'date_of_birth' => $appointment->date_of_birth,
        'born_abroad' => $appointment->born_abroad,
        'country' => $appointment->country,
        'person_city_municipality' => $appointment->person_city_municipality,
        'person_province' => $appointment->person_province,
        'father_last_name' => $appointment->father_last_name,
        'father_first_name' => $appointment->father_first_name,
        'father_middle_name' => $appointment->father_middle_name,
        'mother_last_name' => $appointment->mother_last_name,
        'mother_first_name' => $appointment->mother_first_name,
        'mother_middle_name' => $appointment->mother_middle_name,
        'requesting_party' => $appointment->requesting_party,
        'relationship_to_owner' => $appointment->relationship_to_owner,
        'purpose' => $appointment->purpose,
        'delayed' => $appointment->delayed,
        'delayed_date' => $appointment->delayed_date,
        'appointment_date' => $appointment->appointment_date,
        'reference_number' => $appointment->reference_number,

    ]);
}

public function updateCenomar(Request $request, $id)
{
    // Fetch the appointment data using findOrFail to ensure the ID exists
    $appointment = AppointmentCenomar::findOrFail($id);
    

    // Update the appointment with the new data from the request
    $appointment->update([
        'requester_last_name' => $request->input('requester_last_name'),
        'requester_first_name' => $request->input('requester_first_name'),
        'requester_middle_name' => $request->input('requester_middle_name'),
        'requester_mailing_address' => $request->input('requester_mailing_address'),
        'requester_city_municipality' => $request->input('requester_city_municipality'),
        'requester_province' => $request->input('requester_province'),
        'contact_no' => $request->input('contact_no'),
        'requester_sex' => $request->input('requester_sex'),
        'requester_age' => $request->input('requester_age'),
        'request_type' => $request->input('request_type'),
        'brn' => $request->input('brn'),
        'person_last_name' => $request->input('person_last_name'),
        'person_first_name' => $request->input('person_first_name'),
        'person_middle_name' => $request->input('person_middle_name'),
        'person_sex' => $request->input('person_sex'),
        'date_of_birth' => $request->input('date_of_birth'),
        'born_abroad' => $request->input('born_abroad')? 0 : 1,
        'country' => $request->input('country'),
        'person_city_municipality' => $request->input('person_city_municipality'),
        'person_province' => $request->input('person_province'),
        'father_last_name' => $request->input('father_last_name'),
        'father_first_name' => $request->input('father_first_name'),
        'father_middle_name' => $request->input('father_middle_name'),
        'mother_last_name' => $request->input('mother_last_name'),
        'mother_first_name' => $request->input('mother_first_name'),
        'mother_middle_name' => $request->input('mother_middle_name'),
        'requesting_party' => $request->input('requesting_party'),
        'relationship_to_owner' => $request->input('relationship_to_owner'),
        'purpose' => $request->input('purpose'),
        'delayed' => $request->input('delayed', 0),
        'delayed_date' => $request->input('delayed_date'),
        'appointment_date' => $request->input('appointment_date'),
        'reference_number' => $request->input('reference_number'),

    ]);

    // Return a response indicating the update was successful
    return response()->json([
        'message' => 'Appointment details updated successfully',
        'updated_appointment' => $appointment
    ]);
}


}
