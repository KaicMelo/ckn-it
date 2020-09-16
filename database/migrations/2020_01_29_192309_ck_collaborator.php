<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CkCollaborator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ck_collaborator', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name');
            $table->date('admission_date');
            $table->string('occupation');
            $table->string('cpf');
            $table->string('rg');
            $table->string('photo'); 
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
        Schema::dropIfExists('ck_collaborator');
    }
}
