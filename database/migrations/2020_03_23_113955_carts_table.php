<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carts', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('item_id');
        $table->integer('amount');
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
      Scema::dropIfExists('carts');

    }
}
