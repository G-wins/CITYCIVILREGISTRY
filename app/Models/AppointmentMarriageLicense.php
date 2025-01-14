<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentMarriageLicense extends Model
{
    use HasFactory;

    protected $table = 'appointment_marriage_license';


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


        // Specific Marriage License fields
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

        'requesting_party',
        'relationship_to_owner',
        'purpose',
        'other_purposes',
        'delayed',
        'delayed_date',
        'appointment_date',
       
    ];

    protected $casts = [
        'delayed' => 'boolean',
    ];
}
