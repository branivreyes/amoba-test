<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_data', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->foreignId('route_id')
                ->nullable()
                ->constrained();
            $table->foreignId('calendar_id')
                ->nullable()
                ->constrained();
            $table->integer("vinculation_route")->nullable();
            $table->boolean("route_circular")->default(0);
            $table->dateTime("date_init")->nullable();
            $table->dateTime("date_finish")->nullable();
            $table->boolean("mon")->default(0);
            $table->boolean("tue")->default(0);
            $table->boolean("wed")->default(0);
            $table->boolean("thu")->default(0);
            $table->boolean("fri")->default(0);
            $table->boolean("sat")->default(0);
            $table->boolean("sun")->default(0);
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
        Schema::dropIfExists('route_data');
    }
}
