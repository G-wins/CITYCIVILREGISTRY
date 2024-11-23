<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentMarriageCertificate extends Model
{
    use HasFactory;

    protected $table = 'appointment_marriage_certificates';


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
       
        
        // Specific Marriage Certificate fields
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
        

        'requesting_party',
        'relationship_to_owner',
        'purpose',
        'delayed',
        'delayed_date',
        'appointment_date',
       
    ];

    protected $casts = [
        'delayed' => 'boolean',
        'married_abroad' => 'boolean',
    ];
}