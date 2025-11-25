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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // Reporter information
            $table->string('full_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('reporter_role');

            // Incident / Issue
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('impact')->nullable();
            $table->boolean('ongoing')->default(false);
            $table->string('who_affected')->nullable();
            $table->string('sensitive_data')->nullable();
            $table->text('description');

            // Preference & consent
            $table->string('follow_up')->nullable();
            $table->boolean('confirm')->default(false);
            $table->boolean('agree_policy')->default(false);

            // Meta
            $table->string('reference')->unique();
            $table->enum('status', ['pending', 'reviewed', 'closed'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
