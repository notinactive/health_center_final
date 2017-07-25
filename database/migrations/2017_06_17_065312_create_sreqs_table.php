<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSreqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sreqs', function (Blueprint $table) {
            $table->increments('id');
            $table ->string('codepaygiry');
            $table ->string('codesefaresh');
            $table ->string('unitname');
            $table ->string('state_req');
            $table ->integer('confirm');
            $table ->integer('reject');
            $table ->integer('reject_code');
            $table ->text('reject_desc');
            $table->integer('cancel');
            $table->integer('cancel_confirm');
            $table->timestamps('cancel_date');
            $table->timestamps('cancel_confirm_date');
            $table->timestamps('cancel_reject_date');
            $table->integer('seen')->default(0);
            $table->integer('certificate')->default(0);
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
        Schema::dropIfExists('sreqs');
    }
}
