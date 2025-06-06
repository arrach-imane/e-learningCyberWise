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
        Schema::create('tbl_courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->unsignedBigInteger('user_id');
            $table->string('course_title');
            $table->text('course_description');
            $table->text('course_requirements');
            $table->double('course_price');
            $table->string('course_discount');
            $table->string('course_thumbnail');
            $table->string('course_video_url');
            $table->string('course_visibility');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tbl_courses'); // Corrected table name
    }
};
