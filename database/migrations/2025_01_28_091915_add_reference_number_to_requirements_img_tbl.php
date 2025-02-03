<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('requirements_img_tbl', function (Blueprint $table) {
            $table->string('reference_number')->nullable(); // Add the reference_number column
        });
    }

    public function down()
    {
        Schema::table('requirements_img_tbl', function (Blueprint $table) {
            $table->dropColumn('reference_number');
        });
    }

};
