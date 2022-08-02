<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('price');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('updated_by')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
            $table->foreign('file_id')
                ->on('master_files')
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
        Schema::dropIfExists('payments');
    }
}
