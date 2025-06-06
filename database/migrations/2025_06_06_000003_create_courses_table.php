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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('course_title');
            $table->text('course_description')->nullable();
            $table->text('course_requirements')->nullable();
            $table->decimal('course_price', 8, 2)->default(0);
            $table->integer('course_discount')->default(0);
            $table->string('course_thumbnail')->nullable();
            $table->enum('course_visibility', ['true', 'false'])->default('true');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('tbl_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tbl_courses');
    }
};
