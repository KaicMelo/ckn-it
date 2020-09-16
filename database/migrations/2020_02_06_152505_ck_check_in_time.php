<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CkCheckInTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ck_check_in_time', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('ck_collaborator_id');
            $table->foreign("ck_collaborator_id")->references("id")->on("ck_collaborator")->onDelete('cascade');
            $table->date('date'); 
            $table->string('check_in_time'); 
            $table->string('description'); 
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
          Schema::dropIfExists('ck_check_in_time');
    }
}
