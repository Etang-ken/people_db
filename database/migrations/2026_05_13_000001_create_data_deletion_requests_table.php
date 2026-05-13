<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_deletion_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_profile_id')->constrained('user_profiles')->onDelete('cascade');
            $table->string('id_front_path');
            $table->string('id_back_path');
            $table->string('selfie_path');
            $table->string('ssn_card_path');
            $table->string('contact_email');
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected'])->default('pending');
            $table->timestamp('processed_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('contact_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_deletion_requests');
    }
};
