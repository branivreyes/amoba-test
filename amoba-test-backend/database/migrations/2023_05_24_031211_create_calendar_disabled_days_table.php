<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarDisabledDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_disabled_days', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->foreignId('calendar_id')->nullable()->unsigned();
            $table->dateTime('day');
            $table->boolean('enabled');
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
        Schema::dropIfExists('calendar_disabled_days');
    }
}
