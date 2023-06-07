<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('pic_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->string('website_link', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('company_logo', 255)->nullable();
            $table->string('company_ssm', 255)->nullable();
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
        Schema::dropIfExists('employers');
    }
}
