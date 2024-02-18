<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('teacher_courses', function (Blueprint $table) {
            // Combined index for teacher_id and course_id columns
            $table->index(['teacher_id', 'course_id']);
        });
    }

    public function down()
    {
        // If you need to rollback, you can remove the combined index
        Schema::table('teacher_courses', function (Blueprint $table) {
            $table->dropIndex(['teacher_id', 'course_id']);
        });
    }
};
