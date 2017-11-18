<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnSuppliersIdFromOrdersR extends Migration
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
            if(Schema::hasColumn('orders', 'suppliers_id')) ; //check whether users table has email column
            {
                $table->dropColumn('suppliers_id');                //your logic
            }

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
            if(Schema::hasColumn('orders', 'suppliers_id')) ; //check whether users table has email column
            {
                $table->dropColumn('suppliers_id');                //your logic
            }

        });
    }
}
