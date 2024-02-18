<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('package_definitions', function (Blueprint $table) {
            // Update 'column_name' to be nullable
            $table->string('package_duration')->nullable()->change();
        });
    }

    public function down()
    {
        // If needed, you can revert the change in the down method
        Schema::table('package_definitions', function (Blueprint $table) {
            $table->string('package_duration')->change();
        });
    }

};
