<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->char('name');
            $table->char('type');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('kill_award');
            $table->char('restricted_to');
            $table->char('image_filename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_items');
    }
}
