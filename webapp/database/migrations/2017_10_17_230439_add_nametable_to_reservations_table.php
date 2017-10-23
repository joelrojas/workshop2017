<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNametableToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables_reservations', function (Blueprint $table) {
            $table->string('nameTable');
            $table->string('typeTable');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables_reservations', function (Blueprint $table) {
            $table->dropColumn('nameTable');
            $table->string('typeTable');
        });
    }
}
