<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyPayrollItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_payroll_items', function (Blueprint $table) {
            $table->integer('policy_id')->unsigned();
            $table->integer('payroll_item_id')->unsigned();

            $table->primary(['policy_id', 'payroll_item_id']);

            $table->foreign('policy_id')
                    ->references('id')
                    ->on('policies')
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
        Schema::dropIfExists('policy_payroll_items');
    }

}
