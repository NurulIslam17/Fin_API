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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            // Authentication User
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            // Branch
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            // Customer Information
            $table->string('customer_no')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER']);

            $table->date('date_of_birth');

            $table->string('phone', 20)->unique();
            $table->string('alternate_phone', 20)->nullable();

            $table->string('nid', 30)->unique()->nullable();
            $table->string('passport_no')->unique()->nullable();

            $table->string('email')->nullable();

            $table->string('occupation')->nullable();

            $table->text('present_address');
            $table->text('permanent_address')->nullable();

            // KYC
            $table->enum('kyc_status', ['PENDING', 'UNDER_REVIEW', 'VERIFIED', 'REJECTED', 'EXPIRED'])->default('PENDING');
            $table->enum('status', [
                'ACTIVE',
                'INACTIVE',
                'BLOCKED'
            ])->default('ACTIVE');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
