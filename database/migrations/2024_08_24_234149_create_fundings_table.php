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
        Schema::create('fundings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("no")->index();
            $table->string("name")->index();
            $table->string("email");
            $table->unsignedBigInteger("amount");
            $table->boolean('is_anonymous')->default(false);
            $table->string("message")->nullable();
            $table->enum("status", ["pending", "success", "failed", "expired"]);
            $table->string("snap_token")->nullable();
            $table->foreignUuid('campaign_id');
            $table->uuid('donatur_id');
            $table->foreign('donatur_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundings');
    }
};
