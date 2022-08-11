<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('number_phone');
            $table->string('wa')->nullable();
            $table->dateTime('date_reservation');
            $table->string('hour_reservation');
            $table->unsignedBigInteger('type_reservation_id');
            $table->unsignedBigInteger('name_reservation_id');
            $table->text('address');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('guest_reservations', function (Blueprint $table) {
            $table->foreign('status_id')
                ->on('master_statuses')
                ->references('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_reservations');
    }
}
