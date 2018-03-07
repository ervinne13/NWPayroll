<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePayrollEntriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payroll_entries', function (Blueprint $table) {
            $table->string('employee_code', 30);
            $table->integer('payroll_item_id')->unsigned();
            $table->date('date_applied');

            $table->integer('payroll_id')->unsigned();
            $table->boolean('is_system_generated')->default(true);
            $table->decimal('qty', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->decimal('total_amount', 10, 2);

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->primary(['employee_code', 'payroll_item_id', 'date_applied'], 'employee_payroll_entry_id');

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

            $table->foreign('payroll_id')
                    ->references('id')
                    ->on('payrolls')
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
        Schema::dropIfExists('employee_payroll_entries');
    }

}
