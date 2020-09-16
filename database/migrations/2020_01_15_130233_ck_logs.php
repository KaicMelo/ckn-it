<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CkLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ck_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ck_user_id');
            $table->foreign("ck_user_id")->references("id")->on("ck_users")->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('ck_logs');
    }
}
