<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name')->nullable();
            $table->string('middle_name');
            $table->string('address');
            $table->string('contact_no', 10);
            $table->enum('sex', ['male', 'female', 'lgbtq']);
            $table->integer('age');
            $table->string('appointment_type');
            $table->date('appointment_date');
            $table->string('requesting_party');
            $table->string('relationship_to_owner');
            $table->string('purpose');
            $table->boolean('delayed')->default(0);
            $table->date('delayed_date')->nullable();

            // For Birth Certificate
            $table->string('child_last_name')->nullable();
            $table->string('child_first_name')->nullable();
            $table->string('child_middle_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
           

            // For Marriage Certificate
            $table->string('husband_last_name')->nullable();
            $table->string('husband_first_name')->nullable();
            $table->string('husband_middle_name')->nullable();
            $table->string('wife_last_name')->nullable();
            $table->string('wife_first_name')->nullable();
            $table->string('wife_middle_name')->nullable();
            $table->date('date_of_marriage')->nullable();

            // For Marriage License
            $table->string('applicant_last_name')->nullable();
            $table->string('applicant_first_name')->nullable();
            $table->string('applicant_middle_name')->nullable();
            $table->string('spouse_last_name')->nullable();
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_middle_name')->nullable();
            $table->date('planned_date_of_marriage')->nullable();
            $table->string('place_of_marriage')->nullable();

            // For Death Certificate
            $table->string('deceased_last_name')->nullable();
            $table->string('deceased_first_name')->nullable();
            $table->string('deceased_middle_name')->nullable();
            $table->string('place_of_death')->nullable();
            $table->date('date_of_death')->nullable();

             // For CENOMAR
             $table->string('request_type')->nullable();
             $table->string('brn', 14)->nullable(); // BRN - Birth Reference Number
             $table->string('cenomar_father_last_name')->nullable();
             $table->string('cenomar_father_first_name')->nullable();
             $table->string('cenomar_father_middle_name')->nullable();
             $table->string('cenomar_mother_last_name')->nullable();
             $table->string('cenomar_mother_first_name')->nullable();
             $table->string('cenomar_mother_middle_name')->nullable();

            // For Other Document
            $table->string('other_document')->nullable();

            $table->string('reference_number')->nullable();
            $table->string('status')->default('Pending');
            $table->boolean('attended')->default(false);




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
