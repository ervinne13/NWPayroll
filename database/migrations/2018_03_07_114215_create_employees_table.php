<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('code', 30)->primary();
            $table->boolean('is_active')->default(true);
            $table->integer('location_id')->unsigned();
            $table->integer('policy_id')->unsigned();
            $table->string('tax_category_code', 30);

            $table->string('first_name', 100);
            $table->string('last_name', 100);

            $table->timestamps();

            $table->foreign('location_id')
                    ->references('id')
                    ->on('locations')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('policy_id')
                    ->references('id')
                    ->on('policies')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('tax_category_code')
                    ->references('code')
                    ->on('tax_categories')
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
        Schema::dropIfExists('employees');
    }

}
