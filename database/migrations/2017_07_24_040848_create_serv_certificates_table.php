<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serv_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cert_num');
            $table->integer('state_cert')->default(0);
            $table->string('request_id');
            $table->integer('unit_id');
            $table->integer('unit_confirm_state')->default(0);
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
        Schema::dropIfExists('serv_certificates');
    }
}
