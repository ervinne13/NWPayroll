<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_open')->default(true);
            $table->integer('policy_id')->unsigned();
            $table->date('release_date');
            $table->date('cutoff_start');
            $table->date('cutoff_end');

            $table->boolean('includes_monthly_processables');

            $table->string('approved_by', 100)->nullable();
            $table->string('received_by', 100)->nullable();
            $table->string('prepared_by', 100)->nullable();

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
        Schema::dropIfExists('payrolls');
    }

}
