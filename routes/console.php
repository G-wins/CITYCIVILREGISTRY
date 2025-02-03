<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('delete:past-appointments', function () {
    $models = [
        \App\Models\AppointmentBirthCertificate::class,
        \App\Models\AppointmentMarriageCertificate::class,
        \App\Models\AppointmentMarriageLicense::class,
        \App\Models\AppointmentDeathCertificate::class,
        \App\Models\AppointmentCenomar::class,
        \App\Models\AppointmentOtherDocument::class,
    ];

    $totalDeleted = 0;

    try {
        foreach ($models as $model) {
            $recordsToDelete = $model::where('appointment_date', '<', now());
            $recordCount = $recordsToDelete->count();
            $totalDeleted += $recordCount;

            foreach ($recordsToDelete->get() as $record) {
                $name = $record->name ?? 'Unknown';
                $contact = $record->contact_number ?? 'Unknown';
                Log::info("Deleting record from {$model}: Name - {$name}, Contact Number - {$contact}");
            }

            $recordsToDelete->delete(); // Perform deletion
            Log::info("Deleted {$recordCount} records from {$model}");
        }

        $this->info("Deleted {$totalDeleted} records in total.");
    } catch (\Exception $e) {
        Log::error("Error deleting past appointments: " . $e->getMessage());
        $this->error("An error occurred while deleting records. Check the logs for details.");
    }
})->describe('Delete past appointments from all tables');
