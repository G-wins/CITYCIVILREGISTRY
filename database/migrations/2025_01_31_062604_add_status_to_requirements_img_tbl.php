<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('requirements_img_tbl', function (Blueprint $table) {
            $table->string('status', 255)->default('Pending')->after('file_path'); // Change 'file_path' if needed
        });
    }

    public function down()
    {
        Schema::table('requirements_img_tbl', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
