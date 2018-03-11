<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeVariableValuesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_variable_values', function (Blueprint $table) {
            $table->string('employee_code', 30);
            $table->string('payroll_variable_code', 30);
            $table->date('date_applied');
            $table->decimal('value', 10, 7);

            $table->timestamps();

            $table->primary(['employee_code', 'payroll_variable_code', 'date_applied'], 'employee_variable_value_id');

            $table->foreign('employee_code')
                    ->references('code')
                    ->on('employees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('payroll_variable_code')
                    ->references('code')
                    ->on('payroll_variables')
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
        Schema::dropIfExists('employee_variable_values');
    }

}
