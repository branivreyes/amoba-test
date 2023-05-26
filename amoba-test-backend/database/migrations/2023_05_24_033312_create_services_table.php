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
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->string('external_id')->nullable();
            $table->string('external_budget_id')->nullable();

            $table->string('external_route_id')->nullable();
            $table->foreign('external_route_id')->references('external_id')->on('routes');

            $table->bigInteger('track_id')->nullable();
            $table->string('name')->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('timestamp')->nullable();
            $table->text('arrival_address')->nullable();
            $table->dateTime('arrival_timestamp')->nullable();
            $table->text('departure_address')->nullable();
            $table->dateTime('departure_timestamp')->nullable();
            $table->mediumInteger('capacity')->nullable();
            $table->mediumInteger('confirmed_pax_count')->nullable();
            $table->dateTime('reported_departure_timestamp')->nullable();
            $table->float('reported_departure_kms')->nullable();
            $table->dateTime('reported_arrival_timestamp')->nullable();
            $table->float('reported_arrival_kms')->nullable();
            $table->string('reported_vehicle_plate_number')->nullable();
            $table->boolean('status')->default(0);
            $table->json('status_info')->nullable();
            $table->boolean('reprocess_status')->default(0);
            $table->boolean('return')->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();
            $table->string('synchronized_downstream')->nullable();
            $table->string('synchronized_upstream')->nullable();
            $table->bigInteger('province_id')->nullable();
            $table->boolean('sale_tickets_drivers')->default(0);
            $table->text('notes_drivers')->nullable();
            $table->text('itinerary_drivers')->nullable();
            $table->boolean('cost_if_externalized')->nullable();
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
