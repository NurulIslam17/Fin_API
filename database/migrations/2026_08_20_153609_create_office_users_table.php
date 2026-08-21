<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('office_users', function (Blueprint $table) {

            $table->id();
            // Main authentication user
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Employee information
            $table->string('employee_id')->unique();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();

            // Contact information
            $table->string('phone', 20)->nullable();
            $table->string('alternative_phone', 20)->nullable();
            $table->string('personal_email')->nullable();

            // Address
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            // Employment information
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('resignation_date')->nullable();

            // Identity information
            $table->string('nid')->nullable()->unique();
            $table->string('passport_no')->nullable()->unique();

            // Emergency contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();
            $table->string('emergency_contact_relation')->nullable();

            // Banking/office-specific information

            $table->enum('employee_type', ['permanent', 'contract', 'temporary', 'intern', 'probation',])->default('permanent');
            $table->enum('employment_status', ['active', 'inactive',])->default('active');
            $table->decimal('salary', 15, 2)->nullable();
            // Profile
            $table->string('profile_photo')->nullable();
            // Extra information
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_users');
    }
};
