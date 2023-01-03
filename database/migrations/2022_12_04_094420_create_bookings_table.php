<?php

use App\Models\Package;
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
            $table->foreignIdFor(Package::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->ulid('hash');
            $table->string('token', 50);

            $table->integer('price')->unsigned();
            $table->string('currency')->default('KES');

            $table->date('date');
            $table->time('starts_at');
            $table->time('ends_at');
            $table->integer('additional_hours')->unsigned()->nullable();

            $table->mediumText('notes')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('preferred_location')->nullable();

            $table->boolean('is_approved')->default(false);

            $table->timestamps();
            $table->dateTime('cancelled_at')->nullable();
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
