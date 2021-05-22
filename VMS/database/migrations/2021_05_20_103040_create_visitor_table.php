<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_image');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('checkin_date');
            $table->string('checkout_date');
            $table->string('purpose');
            $table->timestamps();


        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('visitors');

        
    }
}
