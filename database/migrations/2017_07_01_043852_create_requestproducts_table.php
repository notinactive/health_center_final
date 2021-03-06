<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preqs_id');
            $table->foreign('preqs_id')->references('id')->on('preqs')->onDelete('cascade');
            $table->integer('products_id');
            $table->string('count');
            $table->text('description');
            $table->string('fi')->default(0);
            $table->string('price')->default(0);
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
        Schema::dropIfExists('requestproduct');
    }
}
