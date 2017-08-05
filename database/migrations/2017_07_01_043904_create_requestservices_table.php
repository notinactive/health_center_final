<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestservice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sreqs_id');
            $table->foreign('sreqs_id')->references('id')->on('sreqs')->onDelete('cascade');
            $table->integer('services_id');
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
        Schema::dropIfExists('requestservice');
    }
}
