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
            $table->boolean('is_system_generated')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('name', 100)->unique();
            $table->string('payslip_name', 100);
            $table->boolean('is_taxable');
            $table->boolean('is_included_in_13th_month');
            $table->boolean('requires_employee_amount');
            $table->string('uom', 3)->comment('mon|day|hr|min');

            $table->string('variable_dependent_code', 30)->nullable();
            $table->string('variable_dependency_code', 30)->nullable();
            $table->decimal('dependency_multiplier', 10, 7)->default(1);

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
