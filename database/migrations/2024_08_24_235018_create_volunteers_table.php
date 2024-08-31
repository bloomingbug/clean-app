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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no')->index();
            $table->string('name')->index();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('personal_no')->nullable();
            $table->timestamp('presence_at')->nullable();
            $table->string('presence_evidence')->nullable();
            $table->foreignUuid('campaign_id');
            $table->foreignUuid('user_id')->unique();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
