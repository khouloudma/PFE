<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('Company_name');
            $table->string('Country');
            $table->integer('Phone_number');
            $table->string('Category_field');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('Company_name');
            $table->dropColumn('Country');
            $table->dropColumn('Phone_number');
            $table->dropColumn('Category_field');
        });
    }
}
