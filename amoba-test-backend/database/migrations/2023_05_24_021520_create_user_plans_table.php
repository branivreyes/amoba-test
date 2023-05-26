<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->integer('currency_id')->nullable();
            $table->dateTime('start_timestamp')->nullable();
            $table->dateTime('end_timestamp')->nullable();
            $table->dateTime('renewal_timestamp')->nullable();
            $table->decimal('renewal_price')->nullable();
            $table->string('language')->nullable();
            $table->integer('company_id')->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_plans');
    }
}
