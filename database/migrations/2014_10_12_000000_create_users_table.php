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
            $table->string('name')->nullable();
            $table->integer('user_type_id')->nullable();
            
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->string('otp')->nullable();
            $table->string('activate_otp')->default(false);
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->uuid('updated_by')->nullable();

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
