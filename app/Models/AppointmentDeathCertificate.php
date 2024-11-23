<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDeathCertificate extends Model
{
    
    use HasFactory;

    protected $table = 'appointment_death_certificates';


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
       

        // Specific Death Certificate fields
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


        'requesting_party',
        'relationship_to_owner',
        'purpose',
        'delayed',
        'delayed_date',
        'appointment_date',
      
    ];

    protected $casts = [
        'delayed' => 'boolean',
        'died_abroad' => 'boolean',
    ];
}