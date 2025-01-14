<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentBirthCertificate extends Model
{
    use HasFactory;

    protected $table = 'appointment_birth_certificates';


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
       
        // Specific Birth Certificate fields
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
        
        // Father's and Mother's details
        'father_last_name',
        'father_first_name',
        'father_middle_name',
        'mother_last_name',
        'mother_first_name',
        'mother_middle_name',

        'requesting_party',
        'relationship_to_owner',
        'purpose',
        'other_purposes',
        'delayed',
        'delayed_date',
        'appointment_date',
        'reference_number',
        'status',
        'attended',

       
    ];

    protected $casts = [
        'delayed' => 'boolean',
        'born_abroad' => 'boolean',
    ];
}
