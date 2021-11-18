<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
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
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('film_id')->constrained('films')->onDelete('CASCADE');
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('CASCADE');
            $table->integer('tiket');
            $table->integer('total')->default(0);
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
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
        Schema::dropIfExists('bookings');
    }
}
