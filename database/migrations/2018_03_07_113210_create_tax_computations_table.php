<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxComputationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_computations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('over_amount', 10, 2);
            $table->decimal('below_amount', 10, 2);
            $table->decimal('tax_due', 10, 2);
            $table->decimal('percent', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_computations');
    }

}
