<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('status_id');
            $table->string('total_price');
            $table->timestamps();
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('reservation_id')
                ->on('reservations')
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
        Schema::dropIfExists('transaksis');
    }
}
