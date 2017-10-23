<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesReservationsTableJ extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tableReservationDate');
            $table->integer('tables_id')->unsigned();
            $table->foreign('tables_id')->references('id')->on('tables')->onDelete('cascade');
            $table->integer('reservations_id')->unsigned();
            $table->foreign('reservations_id')->references('id')->on('reservations')->onDelete('cascade');
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
        Schema::dropIfExists('tables_reservations');
    }
}
