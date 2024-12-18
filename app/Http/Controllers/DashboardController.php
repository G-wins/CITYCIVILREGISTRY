<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBirthCertificate;
use App\Models\AppointmentMarriageCertificate;
use App\Models\AppointmentMarriageLicense;
use App\Models\AppointmentDeathCertificate;
use App\Models\AppointmentCenomar;
use App\Models\AppointmentOtherDocument;
use Illuminate\Support\Collection;

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
}
