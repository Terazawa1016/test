<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items_table', function (Blueprint $table) {
        $table->increments('item_id');
        $table->string('name');
        $table->integer('price');
        $table->string('item_img')->default('');
        $table->integer('status');
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
      Scema::dropIfExists('items_table');
    }
}
