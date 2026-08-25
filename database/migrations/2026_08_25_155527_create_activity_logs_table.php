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

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('branch_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Example: customer, account, loan, transaction
            $table->string('module');

            // Example: create, update, delete, approve
            $table->string('action');

            // Example: "Updated customer John Doe"
            $table->text('description')->nullable();

            // Polymorphic relation
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();

            // Before update
            $table->json('old_values')->nullable();

            // After update
            $table->json('new_values')->nullable();

            // Extra information
            $table->json('metadata')->nullable();

            $table->string('ip_address', 45)->nullable();

            $table->text('user_agent')->nullable();

            $table->string('url')->nullable();

            $table->string('method', 10)->nullable();

            $table->timestamp('created_at')->useCurrent();

            // Important indexes
            $table->index('user_id');
            $table->index('branch_id');
            $table->index(['module', 'action']);
            $table->index(['subject_type', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
