<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_num');
            $table->string('codepaygiry');
            $table->string('title');
            $table->text('content');            
            $table->integer('unit_id')->unsigned();
            $table->integer('olaviat');
            $table->integer('seen');
            $table->integer('reply_code')->default(0);
            $table->text('reply');
            $table->timestamps('reply_date');
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
        Schema::dropIfExists('tickets');
    }
}
