<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('recurrence'); // daily/weekly/monthly/none
            $table->string('AllDay');
            $table->string('color');
            $table->string('textColor');
            $table->string('id_user');
            $table->string('state');
            $table->integer('limit_of_attendees');
            $table->timestamps();
            $table->string('breaktime');
            $table->datetime('start_break');
            $table->datetime('end_break');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
