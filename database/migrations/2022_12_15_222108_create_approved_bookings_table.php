<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Booking::class)->index()->nullable();
            $table->foreignIdFor(User::class, 'approved_by')->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approved_bookings');
    }
};
