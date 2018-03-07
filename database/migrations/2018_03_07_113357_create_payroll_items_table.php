<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_items', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(true);
            $table->string('name', 100)->unique();
            $table->boolean('is_system_generated')->default(false);
            $table->boolean('is_taxable');
            $table->string('uom', 3)->comment('mon|day|hr|min');
            $table->decimal('special_holiday_rate', 10, 2);
            $table->decimal('regular_holiday_rate', 10, 2);
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
        Schema::dropIfExists('payroll_items');
    }

}
