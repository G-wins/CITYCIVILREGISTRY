<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name','first_name', 'middle_name', 'mailing_address',
        'city_municipality', 'province', 'contact_no', 'sex', 'age',
        'appointment_type', 'requesting_party', 'relationship_to_owner',
        'purpose', 'appointment_date', 'appointment_time', 'other_document',
        'delayed', 'delayed_date', 'purpose_other'
    ];
}
