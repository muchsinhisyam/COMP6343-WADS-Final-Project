<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomOrdersPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_orders_photos', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('custom_orders_id')->unsigned();
            $table->foreign('custom_orders_id')->references('id')->on('custom_orders')->onDelete('cascade');
            $table->string('image_name');
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
        Schema::dropIfExists('custom_orders_photos');
    }
}
