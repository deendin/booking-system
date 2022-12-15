<?php

use App\Models\Flexibility;
use App\Models\User;
use App\Models\VehicleSize;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(User::class)->nullable(); // user who is making the booking. Could be a normal user or the admin.
            $table->foreignIdFor(Flexibility::class)->nullable();
            $table->foreignIdFor(VehicleSize::class)->nullable();
            $table->dateTime('booking_date');
            $table->string('contact_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
