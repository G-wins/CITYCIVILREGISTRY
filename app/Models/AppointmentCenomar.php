<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentCenomar extends Model
{
    use HasFactory;

    protected $table = 'appointment_cenomars';


    protected $fillable = [
        // General appointment fields
        'requester_last_name',
        'requester_first_name',
        'requester_middle_name',
        'requester_mailing_address',
        'requester_city_municipality',
        'requester_province',
        'contact_no',
        'requester_sex',
        'requester_age',
        'appointment_type',
        

        // Specific CENOMAR fields
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
        'mother_middle_name', 


        'requesting_party',
        'relationship_to_owner',
        'purpose',
        'delayed',
        'delayed_date',
        'appointment_date',
       
        
    ];

    protected $casts = [
        'delayed' => 'boolean',
    ];
}