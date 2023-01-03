<?php

use App\Models\Addon;
use App\Models\Booking;
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
        Schema::create('addon_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Addon::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Booking::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('addons_bookings');
    }
};
