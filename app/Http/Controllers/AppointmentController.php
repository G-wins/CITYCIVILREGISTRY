<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User; 
use App\Notifications\NewAppointmentNotification;
use App\Models\AppointmentBirthCertificate;
use App\Models\AppointmentMarriageCertificate;
use App\Models\AppointmentMarriageLicense;
use App\Models\AppointmentDeathCertificate;
use App\Models\AppointmentCenomar;
use App\Models\AppointmentOtherDocument;
use App\Helpers\Calendar;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    
    public function create()
    {
        $calendar = new Calendar();
        return view('client.form', compact('calendar')); 

    }

    public function store(Request $request){
        $request->validate([
            'requester_last_name' => 'required|string|max:255',
            'requester_first_name' => 'required|string|max:255',
            'requester_middle_name' => 'nullable|string|max:255',
            'requester_mailing_address' => 'required|string|max:255',
            'requester_city_municipality' => 'required|string|max:255',
            'requester_province' => 'required|string|max:255',
            'contact_no' => 'required|digits:10',
            'requester_sex' => 'required',
            'requester_age' => 'required|integer|min:1|max:120',
            'appointment_type' => 'required',
            'appointment_date' => 'required|date|after_or_equal:today',
            'requesting_party' => 'required|string|max:255',
            'relationship_to_owner' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'other_purposes' => 'nullable|string|max:255',
            'delayed' => 'required|in:Yes,No',
            'delayed_date' => 'nullable|date',
        ]);

        // Determine the table dynamically based on appointment_type
        $modelClass = $this->getModelClass($request->input('appointment_type'));

        if (!$modelClass) {
            return redirect()->back()->withErrors(['appointment_type' => 'Mali o invalid na appointment type']);
        }

        $appointment = new $modelClass();
        $appointment->fill($request->only([
            'requester_last_name',
            'requester_first_name',
            'requester_middle_name',
            'requester_mailing_address',
            'requester_city_municipality',
            'requester_province',
            'contact_no',
            'requester_sex',
            'requester_age',
            'appointment_date',
            'requesting_party',
            'relationship_to_owner',
            'purpose',
            'other_purposes',
            'delayed',
            'delayed_date',
        ]));


        switch ($request->input('appointment_type')) {
            case 'Birth Certificate':
                $request->validate([
                    'request_type' => 'required|string|max:255',
                    'certificate_of_conversion' => 'required|in:Yes,No',
                    'brn' => 'nullable|string|max:14',
                    'child_last_name' => 'required|string|max:255',
                    'child_first_name' => 'required|string|max:255',
                    'child_middle_name' => 'nullable|string|max:255',
                    'child_sex' => 'required',
                    'date_of_birth' => 'required|date',
                    'place_of_birth_city_municipality' => 'required|string|max:255',
                    'place_of_birth_province' => 'required|string|max:255',
                    'born_abroad' => 'nullable|in:Yes,No',
                    'country' => 'nullable|string|max:255',
                    'father_last_name' => 'required|string|max:255',
                    'father_first_name' => 'required|string|max:255',
                    'father_middle_name' => 'nullable|string|max:255',
                    'mother_last_name' => 'required|string|max:255',
                    'mother_first_name' => 'required|string|max:255',
                    'mother_middle_name' => 'nullable|string|max:255',
                ]);
            
                $appointment->fill($request->only([
                    'request_type',
                    'certificate_of_conversion',
                    'brn',
                    'child_last_name',
                    'child_first_name',
                    'child_middle_name',
                    'child_sex',
                    'date_of_birth',
                    'born_abroad',
                    'country',
                    'place_of_birth_city_municipality',
                    'place_of_birth_province',
                    'father_last_name',
                    'father_first_name',
                    'father_middle_name',
                    'mother_last_name',
                    'mother_first_name',
                    'mother_middle_name',
                ]));
                break;


            case 'Marriage Certificate':

                $request->validate([
                    'request_type' => 'required|string|max:255',
                    'husband_last_name' => 'required|string|max:255',
                    'husband_first_name' => 'required|string|max:255',
                    'husband_middle_name' => 'nullable|string|max:255',
                    'wife_last_name' => 'required|string|max:255',
                    'wife_first_name' => 'required|string|max:255',
                    'wife_middle_name' => 'nullable|string|max:255',
                    'date_of_marriage' => 'required|date',
                    'married_abroad' => 'nullable|in:1,0',
                    'country' => 'nullable|string|max:255',
                    'marriage_city_municipality' => 'required|string|max:255',
                    'marriage_province' => 'required|string|max:255',
                ]);
                $appointment->fill($request->only([
                    'request_type',
                    'husband_last_name',
                    'husband_first_name',
                    'husband_middle_name',
                    'wife_last_name',
                    'wife_first_name',
                    'wife_middle_name',
                    'date_of_marriage',
                    'married_abroad',
                    'country',
                    'marriage_city_municipality',
                    'marriage_province',
                    
                ]));
                break;


            case 'Marriage License':
                $request->validate([
                'request_type' => 'required|string|max:255',
                'brn' => 'nullable|string|max:11',
                'applicant_last_name' => 'required|string|max:255',
                'applicant_first_name' => 'required|string|max:255',
                'applicant_middle_name' => 'nullable|string|max:255',
                'spouse_last_name' => 'required|string|max:255',
                'spouse_first_name' => 'required|string|max:255',
                'spouse_middle_name' => 'nullable|string|max:255',
                'planned_date_of_marriage' => 'required|date|after_or_equal:today',
                'place_of_marriage' => 'required|string|max:255',
                ]);
              
                $appointment->fill($request->only([
                    'request_type',
                    'brn',
                    'applicant_last_name',
                    'applicant_first_name',
                    'applicant_middle_name',
                    'spouse_last_name',
                    'spouse_first_name',
                    'spouse_middle_name',
                    'planned_date_of_marriage',
                    'place_of_marriage',

                    
                ]));
                break;

            case 'Death Certificate':
                $request->validate([
                    'request_type' => 'required|string|max:255',
                    'brn' => 'nullable|string|max:14',
                    'deceased_last_name' => 'required|string|max:255',
                    'deceased_first_name' => 'required|string|max:255',
                    'deceased_middle_name' => 'nullable|string|max:255',
                    'date_of_death' => 'required|date',
                    'died_abroad' => 'nullable|boolean',
                    'country' => 'nullable|string|max:255',
                    'death_city_municipality' => 'required|string|max:255',
                    'death_province' => 'required|string|max:255',
                ]);
                $appointment->fill($request->only([
                    'request_type',
                    'brn',
                    'deceased_last_name',
                    'deceased_first_name',
                    'deceased_middle_name',
                    'date_of_death',
                    'died_abroad',
                    'country',
                    'death_city_municipality',
                    'death_province',
                ]));
                break;

                

            case 'Cenomar':
                $request->validate([
                'request_type' => 'required|string|max:255',
                'brn' => 'nullable|string|max:14',
                'person_last_name' => 'required|string|max:255',
                'person_first_name' => 'required|string|max:255',
                'person_middle_name' => 'nullable|string|max:255',
                'person_sex' => 'required|string',
                'date_of_birth' => 'required|date',
                'born_abroad' => 'nullable|boolean',
                'country' => 'nullable|string|max:255',
                'person_city_municipality' => 'required|string|max:255',
                'person_province' => 'required|string|max:255',
                'father_last_name' => 'required|string|max:255',
                'father_first_name' => 'required|string|max:255',
                'father_middle_name' => 'nullable|string|max:255',
                'mother_last_name' => 'required|string|max:255',
                'mother_first_name' => 'required|string|max:255',
                'mother_middle_name' => 'nullable|string|max:255',
                ]);
                
                $appointment->fill($request->only([
                'request_type', 
                'brn', 
                'person_last_name', 
                'person_first_name', 
                'person_middle_name', 
                'person_sex', 
                'date_of_birth', 
                'born_abroad', 
                'country',
                'person_city_municipality', 
                'person_province',
                'father_last_name', 
                'father_first_name', 
                'father_middle_name', 
                'mother_last_name', 
                'mother_first_name', 
                'mother_middle_name'
                ]));
                break;


           

            case 'Other Document':
                $request->validate([
                    'other_document' => 'required|string|max:255',
                    'document_details' => 'required|string|max:5000',
                
                ]);

                $appointment->fill($request->only([
                    'other_document',
                    'document_details',
                
                ]));
                break;

        }
            $appointment->requesting_party = $request->input('requesting_party');
            $appointment->relationship_to_owner = $request->input('relationship_to_owner');
            $appointment->purpose = $request->input('purpose');
            if ($request->input('appointment_type') === 'Birth Certificate' || $request->input('appointment_type') === 'Cenomar') {
                $appointment->born_abroad = $request->input('born_abroad') == 1 ? 1 : 0;
            }                
            if ($request->input('appointment_type') === 'Marriage Certificate') {
                $appointment->married_abroad = $request->input('married_abroad') === 'Yes' ? 1 : 0;
            }            
            if ($request->input('appointment_type') === 'Cenomar') {
                $appointment->date_of_birth = $request->input('date_of_birth');
            }                    
            $appointment->delayed = $request->input('delayed') === 'Yes' ? 1 : 0;
            if ($appointment->delayed) {
                $appointment->delayed_date = $request->input('delayed_date');
            }

            // generate reference number base on the appointment Type 
            $selectedService = $request->input('appointment_type');
            $prefix = $this->getReferencePrefix($selectedService);
            $appointment->reference_number = $prefix . strtoupper(uniqid());

            $now = Carbon::now('Asia/Manila');
            $appointment->created_at = $now->format('Y-m-d h:i:s A');
            $appointment->updated_at = $now->format('Y-m-d h:i:s A');



            $appointment->save();

            // **Send Notification to Admin**
            $admin = User::where('is_admin', true)->first(); // Kunin ang admin user
            if ($admin) {
                $admin->notify(new NewAppointmentNotification([
                    'name' => $appointment->requester_last_name . ', ' . $appointment->requester_first_name,
                    'document_type' => $request->input('appointment_type'),
                    'submitted_at' => $now->format('Y-m-d h:i:s A'),
                ]));
            }

            return redirect()->route('reference_page', ['reference_number' => $appointment->reference_number]);
    }
    private function getReferencePrefix($documentService){
        $prefixes = [
            'Birth Certificate' => 'BC-',
            'Marriage Certificate' => 'MC-',
            'Marriage License' => 'ML-',
            'Death Certificate' => 'DC-',
            'Cenomar' => 'CN-',
            'Other Document' => 'OD-',
        ];

        return $prefixes[$documentService] ?? 'GEN-';
    }



    // Fetch available slots dynamically
    public function availableSlots(Request $request)
    {
        $selectedDate = $request->input('date');

        $models = [
            \App\Models\AppointmentBirthCertificate::class,
            \App\Models\AppointmentMarriageCertificate::class,
            \App\Models\AppointmentMarriageLicense::class,
            \App\Models\AppointmentDeathCertificate::class,
            \App\Models\AppointmentCenomar::class,
            \App\Models\AppointmentOtherDocument::class,

        ];

        $amSlots = 100;
        $pmSlots = 100;

        foreach ($models as $model) {
            $amSlots -= $model::where('appointment_date', $selectedDate)->where('appointment_time', 'AM')->count();
            $pmSlots -= $model::where('appointment_date', $selectedDate)->where('appointment_time', 'PM')->count();
        }

        return response()->json([
            'AM' => $amSlots > 0 ? $amSlots : 'Full',
            'PM' => $pmSlots > 0 ? $pmSlots : 'Full',
        ]);
    }
    // Determine model based on appointment_type
    private function getModelClass($appointmentType)
    {
    switch ($appointmentType) {
        case 'Birth Certificate':
            return \App\Models\AppointmentBirthCertificate::class;
        case 'Marriage Certificate':
            return \App\Models\AppointmentMarriageCertificate::class;
        case 'Marriage License':
            return \App\Models\AppointmentMarriageLicense::class;
        case 'Death Certificate':
            return \App\Models\AppointmentDeathCertificate::class;
        case 'Cenomar':
            return \App\Models\AppointmentCenomar::class;
        case 'Other Document':
            return \App\Models\AppointmentOtherDocument::class;
        default:
            return null;
    }
    }

    public function updateStatus(Request $request){
        $referenceNumber = $request->input('reference_number');
        $status = $request->input('status');

        // List of tables to check
        $tables = [
            \App\Models\AppointmentBirthCertificate::class,
            \App\Models\AppointmentMarriageCertificate::class,
            \App\Models\AppointmentMarriageLicense::class,
            \App\Models\AppointmentDeathCertificate::class,
            \App\Models\AppointmentCenomar::class,
            \App\Models\AppointmentOtherDocument::class,
        ];

        foreach ($tables as $model) {
            $record = $model::where('reference_number', $referenceNumber)->first();
            if ($record) {
                $record->status = $status;
                $record->save();
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
    
    public function checkReference(Request $request)
    {
        $refNumber = $request->refNumber;

        // Check all models for the reference_number
        $exists = AppointmentBirthCertificate::where('reference_number', $refNumber)->exists() ||
                AppointmentMarriageCertificate::where('reference_number', $refNumber)->exists() ||
                AppointmentMarriageLicense::where('reference_number', $refNumber)->exists() ||
                AppointmentDeathCertificate::where('reference_number', $refNumber)->exists() ||
                AppointmentCenomar::where('reference_number', $refNumber)->exists() ||
                AppointmentOtherDocument::where('reference_number', $refNumber)->exists();

        if ($exists) {
            return response()->json([
                'valid' => true, 
                'redirect' => route('image.requirements')
            ]);
        } else {
            return response()->json(['valid' => false]);
        }
    }
    
}
