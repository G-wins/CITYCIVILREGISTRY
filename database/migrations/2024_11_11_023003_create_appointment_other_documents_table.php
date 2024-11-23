<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentOtherDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_other_documents', function (Blueprint $table) {
            $table->id();

            // General appointment fields
            $table->string('other_document');
            $table->text('document_details'); 
            $table->string('requester_last_name');
            $table->string('requester_first_name');
            $table->string('requester_middle_name')->nullable();
            $table->string('requester_mailing_address');
            $table->string('requester_city_municipality');
            $table->string('requester_province');
            $table->string('contact_no', 10);
            $table->string('requester_sex');
            $table->integer('requester_age');
            $table->string('requesting_party');
            $table->string('relationship_to_owner');
            $table->string('purpose');
            $table->boolean('delayed');
            $table->date('delayed_date')->nullable();
            $table->date('appointment_date');
            $table->string('reference_number')->nullable();
            $table->string('status')->default('Pending');
            $table->boolean('attended')->default(false);

            // Specific field for "Other Document"

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_other_documents');
    }
}