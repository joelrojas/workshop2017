<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuppliersProductsIdToTableDetailsR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('details', function (Blueprint $table) {
            //
            $table->integer('suppliers_products_id')->unsigned();
            $table->foreign('suppliers_products_id')->references('id')->on('suppliers_products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('details', function (Blueprint $table) {
            //
            $table->integer('suppliers_products_id')->unsigned();
            $table->foreign('suppliers_products_id')->references('id')->on('suppliers_products');

        });
    }
}
