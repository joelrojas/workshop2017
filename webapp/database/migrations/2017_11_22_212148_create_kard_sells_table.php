<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKardSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kard_sells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('suppliers_products_id');
            $table->foreign('suppliers_products_id')->references('id')->on('suppliers_products');
            $table->decimal('total',10,2);
            $table->integer('quantity');
            $table->date('date');
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
        Schema::dropIfExists('kard_sells');
    }
}
