<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_reservation_id');
            $table->unsignedBigInteger('name_reservation_id');
            $table->string('city');
            $table->string('village');
            $table->text('address');
            $table->dateTime('date_reservation');
            $table->string('hour_reservation');
            $table->unsignedBigInteger('reservation_meet')->nullable()->default(0);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->string('reservation_repeat')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')
                ->on('users')
                ->references('id');

            $table->foreign('status_id')
                ->on('master_statuses')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
