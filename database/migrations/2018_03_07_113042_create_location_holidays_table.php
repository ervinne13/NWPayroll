<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationHolidaysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_holidays', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('holiday_id')->unsigned();

            $table->primary(['location_id', 'holiday_id']);

            $table->foreign('location_id')
                    ->references('id')
                    ->on('locations')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('holiday_id')
                    ->references('id')
                    ->on('holidays')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_holidays');
    }

}
