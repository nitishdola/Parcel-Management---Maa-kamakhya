<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loading_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id', false, true);
            $table->enum('package_received', ['yes', 'no'])->default('no');
            $table->string('package_transportation_method', 50)->comment('Package transportation method from Patna. Truck/Bus');
            $table->enum('paid', ['yes', 'no'])->default('no')->comment('Whether paid for Package transportation from Patna');
            $table->decimal('transport_charge', 10,2);
            $table->string('remarks', 500);
            $table->date('loading_date');
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
        Schema::drop('loading_infos');
    }
}
