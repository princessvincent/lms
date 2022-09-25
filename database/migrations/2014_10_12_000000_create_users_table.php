<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('track');
            $table->string('course');
            $table->string('country');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('age');
            $table->string('education_level');
            $table->string('disabilities');
            $table->string('experience_level');
            $table->string('hear_aboutus');
            $table->string('about_yourself');
            $table->string('status')->default(0);
            $table->string('role_as')->default(0);
            $table->string('student_id');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
