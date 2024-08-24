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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug', 100)->unique()->index();
            $table->string('title')->index();
            $table->date('event_date')->nullable();
            $table->time('event_time', 0)->nullable();
            $table->string('cover')->nullable();
            $table->text('description');
            $table->string('longitude', 50);
            $table->string('latitude', 50);
            $table->integer('vote');
            $table->text('address');
            $table->uuid('proposed_by_id');
            $table->foreign('proposed_by_id')->references('id')->on('users');
            $table->string('approved_by');
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('city_id')->constrained();
            $table->unsignedBigInteger('total_fund');
            $table->unsignedBigInteger('target_fund');
            $table->date('due_date_fund');
            $table->integer('target_volunteer');
            $table->date('due_date_volunteer');
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
        Schema::dropIfExists('campaigns');
    }
};
