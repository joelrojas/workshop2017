<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSuppliersProductsIdToOrdersR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            /*
            if(Schema::hasColumn('orders', 'products_id')) ; //check whether users table has email column
            {
                $table->dropColumn('products_id');                //your logic
            }
            */
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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('suppliers_products_id')->unsigned();
            $table->foreign('suppliers_products_id')->references('id')->on('suppliers_products');

        });
    }
}
