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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('room_number');
            $table->unsignedBigInteger('hostel_id');
            $table->string('hostel_name');
            $table->string('hostel_location');
            $table->boolean('is_reserved')->default(false);
            $table->timestamps();
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('hostel_id')->references('id')->on('hostels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
