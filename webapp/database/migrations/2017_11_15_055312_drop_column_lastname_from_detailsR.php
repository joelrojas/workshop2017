<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnLastnameFromDetailsR extends Migration
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
            if(Schema::hasColumn('details', 'lastname')) ; //check whether users table has email column
            {
                $table->dropColumn('lastname');                //your logic
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
        Schema::table('details', function (Blueprint $table) {
            //
            if(Schema::hasColumn('details', 'lastname')) ; //check whether users table has email column
            {
                $table->dropColumn('lastname');                //your logic
            }
        });
    }
}
