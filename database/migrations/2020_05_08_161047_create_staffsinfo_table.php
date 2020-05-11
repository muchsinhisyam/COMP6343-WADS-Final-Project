<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffsinfo', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("address");
            $table->date("dob");
            $table->boolean("gender");
            $table->string("role");
            $table->string("telpno");
            $table->string("password");
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
        Schema::dropIfExists('staffsinfo');
    }
}
