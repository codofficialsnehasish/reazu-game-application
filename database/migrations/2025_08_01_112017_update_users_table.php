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
        Schema::table('users', function (Blueprint $table) {
            // First remove the unique constraint
            // $table->dropUnique(['email']);
            
            // Then modify the column to be nullable
            $table->string('email')->nullable()->change();
            
            // Add new columns
            $table->tinyInteger('status')->default(0)->after('name');
            $table->string('phone')->unique()->nullable()->after('email');
            $table->string('otp')->nullable()->after('phone');
            $table->string('profile_image')->nullable()->after('otp');
            $table->enum('theme', ['light', 'dark'])->default('light');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove added columns
            $table->dropColumn(['phone', 'otp', 'profile_image']);
            
            // Revert email changes
            // $table->string('email')->nullable(false)->change();
            // $table->unique('email'); // Re-add the unique constraint
        });
    }
};
