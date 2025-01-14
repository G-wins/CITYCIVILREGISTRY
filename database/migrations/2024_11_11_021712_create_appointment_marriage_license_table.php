<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentMarriageLicenseTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_marriage_license', function (Blueprint $table) {
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
           
    
            // Marriage license-specific fields
            $table->string('request_type');
            $table->string('brn', 11)->nullable();
            $table->string('applicant_last_name');
            $table->string('applicant_first_name');
            $table->string('applicant_middle_name')->nullable();
            $table->string('spouse_last_name');
            $table->string('spouse_first_name');
            $table->string('spouse_middle_name')->nullable();
            $table->date('planned_date_of_marriage');
            $table->string('place_of_marriage');


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
        Schema::dropIfExists('appointment_marriage_license');
    }

};