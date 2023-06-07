<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name', 255)->nullable();
            $table->string('email')->unique();
            $table->string('nationality', 255)->nullable();
            $table->string('ic_passport', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->integer('university')->nullable();
            $table->string('course', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('profile_pic', 255)->nullable();
            $table->string('student_card', 255)->nullable();
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
}
