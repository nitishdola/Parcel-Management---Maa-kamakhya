<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_number');
            $table->date('date');
            $table->integer('from');
            $table->integer('to');
            $table->string('consignor');
            $table->integer('no_of_packages');
            $table->decimal('weight', 10,2);
            $table->decimal('freight_charge', 10,2);
            $table->decimal('insurance_charge', 10,2);
            $table->decimal('sc_charge', 10,2);
            $table->decimal('grand_total', 10,2);
            $table->string('consignee');
            $table->string('paid');
            $table->tinyInteger('processed')->default(0);
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
        Schema::drop('orders');
    }
}
