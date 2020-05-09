<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCustomersinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customersinfo', function (Blueprint $table) {
            $table->string("name");
            $table->text("address");
            $table->date("dob");
            $table->boolean("gender");
            $table->string("role");
            $table->string("telpno");
            $table->string("password");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('customersinfo', function (Blueprint $table) {
            $table->dropColumn("name");
            $table->dropColumn("address");
            $table->dropColumn("dob");
            $table->dropColumn("gender");
            $table->dropColumn("role");
            $table->dropColumn("telpno");
            $table->dropColumn("password");
        });
    }
}
