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
        Schema::create('account_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');

            $table->decimal('minimum_balance', 15, 2)->default(0);
            $table->decimal('interest_rate', 5, 2)->default(0);

            $table->decimal('overdraft_limit', 15, 2)->default(0);
            $table->decimal('daily_withdraw_limit', 15, 2)->default(0);
            $table->decimal('daily_transfer_limit', 15, 2)->default(0);

            $table->boolean('cheque_book')->default(false);
            $table->boolean('atm_card')->default(true);
            $table->boolean('online_banking')->default(true);

            $table->decimal('monthly_fee', 15, 2)->default(0);

            $table->enum('status', [
                'ACTIVE',
                'INACTIVE'
            ])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_types');
    }
};
