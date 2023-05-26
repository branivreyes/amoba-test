<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->string("external_id")->unique();
            $table->string("invitation_code")->nullable();
            $table->string("title")->nullable();
            $table->dateTime("start_timestamp")->nullable();
            $table->dateTime("end_timestamp")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
