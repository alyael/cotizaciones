<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');

            //FK
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');

            //FK
            $table->integer('user_create_id')->unsigned();
            $table->foreign('user_create_id')->references('id')->on('users');

            //FK
            $table->integer('type_center_id')->unsigned();
            $table->foreign('type_center_id')->references('id')->on('type_center_costs');

            $table->softDeletes();
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
        Schema::dropIfExists('quotations');
    }
}
