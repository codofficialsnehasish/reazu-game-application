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
        Schema::create('contact_actions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // "Message us on Whatsapp", "Call us", etc.
            $table->string('icon_image')->nullable(); // Heroicon name or custom icon
            $table->string('link'); // URL, tel: link, mailto: link, or route
            $table->string('type'); // whatsapp, email, phone, tutorial, article
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_actions');
    }
};
