<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePayrollItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payroll_items', function (Blueprint $table) {
            $table->string('employee_code');
            $table->integer('payroll_item_id')->unsigned();
            $table->decimal('amount', 10, 7)->default(0)->comment('Has value when the payroll item is marked "requires_employee_amount".');
            $table->timestamps();

            $table->foreign('employee_code')
                    ->references('code')
                    ->on('employees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('payroll_item_id')
                    ->references('id')
                    ->on('payroll_items')
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
        Schema::dropIfExists('employee_payroll_items');
    }

}
