<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('clients', function($table) {
        $table->string('phone');
        $table->string('address');
        $table->string('city');
        $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('clients', function($table) {
        $table->dropColumn('phone');
        $table->dropColumn('Address');
        $table->dropColumn('city');
        $table->dropColumn('website');
      });
    }
}
