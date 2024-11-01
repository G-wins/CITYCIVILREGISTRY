<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AppointmentController extends Controller
{
   
    public function create()
    {
        return view('client.form'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_no' => 'required|digits:10', 
            'sex' => 'required',
            'age' => 'required|integer|min:1|max:120',
            'appointment_type' => 'required',
            'appointment_date' => 'required|date|after_or_equal:today',
            'requesting_party' => 'required|string|max:255',
            'relationship_to_owner' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'delayed' => 'required|in:Yes,No',
            'delayed_date' => 'nullable|date|after_or_equal:today',
        ]);

        
        $appointment = new Appointment();
        $appointment->last_name = $request->input('last_name');
        $appointment->first_name = $request->input('first_name'); 
        $appointment->middle_name = $request->input('middle_name');
        $appointment->address = $request->input('address');
        $appointment->contact_no = $request->input('contact_no');
        $appointment->sex = $request->input('sex');
        $appointment->age = $request->input('age');
        $appointment->appointment_type = $request->input('appointment_type');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->reference_number = uniqid('REF-'); 
        $appointment->status = 'Pending'; 
        $appointment->attended = false; 

        switch ($request->input('appointment_type')) {
            case 'Birth Certificate':
                $request->validate([
                    'child_last_name' => 'required|string|max:255',
                    'child_first_name' => 'nullable|string|max:255',
                    'child_middle_name' => 'required|string|max:255',
                    'date_of_birth' => 'required|date',
                    'place_of_birth' => 'required|string|max:255',
                    'father_last_name' => 'required|string|max:255',
                    'father_first_name' => 'nullable|string|max:255',
                    'father_middle_name' => 'required|string|max:255',
                    'mother_last_name' => 'required|string|max:255',
                    'mother_first_name' => 'nullable|string|max:255',
                    'mother_middle_name' => 'required|string|max:255',
                  
                ]);
                $appointment->child_last_name = $request->input('child_last_name');
                $appointment->child_first_name = $request->input('child_first_name');
                $appointment->child_middle_name = $request->input('child_middle_name');
                $appointment->date_of_birth = $request->input('date_of_birth');
                $appointment->place_of_birth = $request->input('place_of_birth');
                $appointment->father_last_name = $request->input('father_last_name');
                $appointment->father_first_name = $request->input('father_first_name');
                $appointment->father_middle_name = $request->input('father_middle_name');
                $appointment->mother_last_name = $request->input('mother_last_name');
                $appointment->mother_first_name = $request->input('mother_first_name');
                $appointment->mother_middle_name = $request->input('mother_middle_name');
              
                break;

            case 'Marriage Certificate':
                $request->validate([
                    'husband_last_name' => 'required|string|max:255',
                    'husband_first_name' => 'nullable|string|max:255',
                    'husband_middle_name' => 'required|string|max:255',
                    'wife_last_name' => 'required|string|max:255',
                    'wife_first_name' => 'nullable|string|max:255',
                    'wife_middle_name' => 'required|string|max:255',
                    'date_of_marriage' => 'required|date',
                ]);
                $appointment->husband_last_name = $request->input('husband_last_name');
                $appointment->husband_first_name = $request->input('husband_first_name');
                $appointment->husband_middle_name = $request->input('husband_middle_name');
                $appointment->wife_last_name = $request->input('wife_last_name');
                $appointment->wife_first_name = $request->input('wife_first_name');
                $appointment->wife_middle_name = $request->input('wife_middle_name');
                $appointment->date_of_marriage = $request->input('date_of_marriage');
                break;

            case 'Marriage License':
                $request->validate([
                    'applicant_last_name' => 'required|string|max:255',
                    'applicant_first_name' => 'nullable|string|max:255',
                    'applicant_middle_name' => 'required|string|max:255',
                    'spouse_last_name' => 'required|string|max:255',
                    'spouse_first_name' => 'nullable|string|max:255',
                    'spouse_middle_name' => 'required|string|max:255',
                    'planned_date_of_marriage' => 'required|date|after_or_equal:today',
                    'place_of_marriage' => 'required|string|max:255',
                ]);
                $appointment->applicant_last_name = $request->input('applicant_last_name');
                $appointment->applicant_first_name = $request->input('applicant_first_name');
                $appointment->applicant_middle_name = $request->input('applicant_middle_name');
                $appointment->spouse_last_name = $request->input('spouse_last_name');
                $appointment->spouse_first_name = $request->input('spouse_first_name');
                $appointment->spouse_middle_name = $request->input('spouse_middle_name');
                $appointment->planned_date_of_marriage = $request->input('planned_date_of_marriage');
                $appointment->place_of_marriage = $request->input('place_of_marriage');
                break;

            case 'Death Certificate':
                $request->validate([
                    'deceased_last_name' => 'required|string|max:255',
                    'deceased_first_name' => 'nullable|string|max:255',
                    'deceased_middle_name' => 'required|string|max:255',
                    'place_of_death' => 'required|string|max:255',
                    'date_of_death' => 'required|date',
                ]);
                $appointment->deceased_last_name = $request->input('deceased_last_name');
                $appointment->deceased_first_name = $request->input('deceased_first_name');
                $appointment->deceased_middle_name = $request->input('deceased_middle_name');
                $appointment->place_of_death = $request->input('place_of_death');
                $appointment->date_of_death = $request->input('date_of_death');
                break;

                case 'Cenomar':
                    $request->validate([
                        'request_type' => 'required|string|max:255',
                        'brn' => 'nullable|string|max:14',
                        'father_last_name' => 'required|string|max:255',
                        'father_first_name' => 'nullable|string|max:255',
                        'father_middle_name' => 'required|string|max:255',
                        'mother_last_name' => 'required|string|max:255',
                        'mother_first_name' => 'nullable|string|max:255',
                        'mother_middle_name' => 'required|string|max:255',
                       
                    ]);
                    $appointment->request_type = $request->input('request_type');
                    $appointment->brn = $request->input('brn');
                    $appointment->father_last_name = $request->input('father_last_name');
                    $appointment->father_first_name = $request->input('father_first_name');
                    $appointment->father_middle_name = $request->input('father_middle_name');
                    $appointment->mother_last_name = $request->input('mother_last_name');
                    $appointment->mother_first_name = $request->input('mother_first_name');
                    $appointment->mother_middle_name = $request->input('mother_middle_name');
                    
                    break;
    

            case 'Other': 
                $request->validate([
                    'other_document' => 'required|string|max:255',
                ]);
                $appointment->other_document = $request->input('other_document');
                break;
        }

        
        $appointment->requesting_party = $request->input('requesting_party');
        $appointment->relationship_to_owner = $request->input('relationship_to_owner');
        $appointment->purpose = $request->input('purpose');

       
        $appointment->delayed = $request->input('delayed') === 'Yes' ? 1 : 0; 
        if ($appointment->delayed) {
            $appointment->delayed_date = $request->input('delayed_date'); 
        }


    $now = Carbon::now('Asia/Manila');
    $appointment->created_at = $now->format('Y-m-d h:i:s A'); 
    $appointment->updated_at = $now->format('Y-m-d h:i:s A');



        $appointment->save();

        return redirect('/appointment')->with('success', 'Appointment created successfully!');
    }
      // Fetch unavailable dates
      public function unavailableDates()
      {
          $unavailableDates = Appointment::where('status', '!=', 'Cancelled')
              ->pluck('appointment_date')
              ->unique()
              ->values();
  
          return response()->json($unavailableDates);
      }
  
      // Fetch available slots
      public function availableSlots(Request $request)
      {
          $selectedDate = $request->input('date');
          
          $amSlots = 100 - Appointment::where('appointment_date', $selectedDate)->where('appointment_time', 'AM')->count();
          $pmSlots = 100 - Appointment::where('appointment_date', $selectedDate)->where('appointment_time', 'PM')->count();
  
          return response()->json([
              'AM' => $amSlots > 0 ? $amSlots : 'Full',
              'PM' => $pmSlots > 0 ? $pmSlots : 'Full'
          ]);
      }
}
