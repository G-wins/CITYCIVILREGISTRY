<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentBirthCertificatesTable extends Migration
{
    
    public function up()
{
    Schema::create('appointment_birth_certificates', function (Blueprint $table) {
        $table->id();
        
        // General appointment fields
        $table->string('requester_last_name');
        $table->string('requester_first_name');
        $table->string('requester_middle_name')->nullable();
        $table->string('requester_mailing_address');
        $table->string('requester_city_municipality');
        $table->string('requester_province');
        $table->string('contact_no', 10);
        $table->string('requester_sex');
        $table->integer('requester_age');
       

        // Birth certificate-specific fields
        $table->string('request_type');
        $table->string('certificate_of_conversion')->nullable();
        $table->string('brn')->nullable();
        $table->string('child_last_name');
        $table->string('child_first_name');
        $table->string('child_middle_name')->nullable();
        $table->string('child_sex');
        $table->date('date_of_birth');
        $table->boolean('born_abroad')->nullable();
        $table->string('country')->nullable();
        $table->string('place_of_birth_city_municipality');
        $table->string('place_of_birth_province');
       
        
        // Parent's details
        $table->string('father_last_name');
        $table->string('father_first_name');
        $table->string('father_middle_name')->nullable();
        $table->string('mother_last_name');
        $table->string('mother_first_name');
        $table->string('mother_middle_name')->nullable();

        $table->string('requesting_party');
        $table->string('relationship_to_owner');
        $table->string('purpose');
        $table->boolean('delayed');
        $table->date('delayed_date')->nullable();
        $table->date('appointment_date');
        $table->string('reference_number')->nullable();
        $table->string('status')->default('Pending');
        $table->boolean('attended')->default(false);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_birth_certificates');
    }
};