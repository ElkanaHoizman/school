<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function($table){
           $table->string('role'); 
            $table->string('phone');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         schema::table('users',function($table){
           $table->dropColumn('role');
            $table->dropColumn('phone'); 
         });
    }
}
