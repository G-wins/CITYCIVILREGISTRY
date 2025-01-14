<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentDeathCertificatesTable extends Migration
{
    public function up()
{
    Schema::create('appointment_death_certificates', function (Blueprint $table) {
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
     

        // Death certificate-specific fields
        $table->string('request_type');
        $table->string('brn', 14)->nullable();
        $table->string('deceased_last_name');
        $table->string('deceased_first_name');
        $table->string('deceased_middle_name')->nullable();
        $table->date('date_of_death');
        $table->boolean('died_abroad')->nullable();
        $table->string('country')->nullable();
        $table->string('death_city_municipality');
        $table->string('death_province');
        

        $table->string('requesting_party');
        $table->string('relationship_to_owner');
        $table->string('purpose');
        $table->string('other_purposes', 255)->nullable();
        $table->boolean('delayed');
        $table->date('delayed_date')->nullable();
        $table->date('appointment_date');
        $table->string('reference_number')->nullable();
        $table->string('status')->default('Pending');
        $table->boolean('attended')->default(false);

        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('appointment_death_certificates');
    }

};