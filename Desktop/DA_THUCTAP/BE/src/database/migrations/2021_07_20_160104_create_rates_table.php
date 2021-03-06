<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->unsignedInteger('idOrder');
            $table->unsignedInteger('idProduct');
            $table->unsignedInteger('idCustomer');
            $table->integer('vote');
            $table->timestamps();
            $table->primary(['idOrder', 'idProduct', 'idCustomer']);
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('idOrder')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idCustomer')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
