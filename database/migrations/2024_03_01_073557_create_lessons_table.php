<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_lessons', function (Blueprint $table) {
            $table->bigIncrements('lesson_id');
            $table->unsignedBigInteger('course_id');
            $table->string('lesson_title');
            $table->string('lesson_duration');
            $table->string('lesson_video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tbl_lessons'); // Corrected table name
    }
};
