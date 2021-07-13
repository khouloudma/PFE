<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_service');
            $table->datetime('hours');
            $table->integer('id_visitor');
            $table->string('state');
            $table->timestamps();
            $table->integer('id_department');
            $table->integer('id_event');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('availabilities', function (Blueprint $table) {
            Schema::dropIfExists('availabilities');

        });
    }
}
