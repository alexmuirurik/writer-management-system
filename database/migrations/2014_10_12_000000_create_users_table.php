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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('country')->nullable();
            $table->string('balance')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('email')->unique();
            $table->string('type')->default('writer');
            $table->string('last_seen');
            $table->string('payment_email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
