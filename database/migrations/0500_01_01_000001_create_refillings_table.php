<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refillings', function (Blueprint $table) {
             $table->id();
            $table->date('event_date');
            $table->string('owner');
            $table->BigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('users');
            $table->float('volume', 9, 2);
            $table->float('price', 9, 2);
            $table->float('sum', 9, 2);
            $table->BigInteger('dir_petrol_station_brand_id')->unsigned()->nullable();
            $table->foreign('dir_petrol_station_brand_id')->references('id')->on('dir_petrol_station_brands');
            $table->BigInteger('dir_petrol_station_id')->unsigned()->nullable();
            $table->foreign('dir_petrol_station_id')->references('id')->on('dir_petrol_stations');
            $table->BigInteger('dir_fuel_category_id')->unsigned()->nullable();
            $table->foreign('dir_fuel_category_id')->references('id')->on('dir_fuel_categories');
            $table->BigInteger('dir_fuel_type_id')->unsigned()->nullable();
            $table->foreign('dir_fuel_type_id')->references('id')->on('dir_fuel_types');
            $table->BigInteger('truck_id')->unsigned()->nullable();
            $table->foreign('truck_id')->references('id')->on('trucks');
            $table->string('integration_id')->nullable();
            $table->string('comment')->nullable();
            $table->BigInteger('profit_id')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refillings');
    }
};
