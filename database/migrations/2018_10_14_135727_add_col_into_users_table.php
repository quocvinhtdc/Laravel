<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     // tự làm
    public function up()
    {
        Schema::table('users', function (Blueprint  $table) {
            $table->string('role')->default('user');
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function(Blueprint  $table) {
                $table->dropColumn('role');
            });
        }
        if (Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function(Blueprint  $table) {
                $table->dropColumn('phone');
            });
        }
    }
}
