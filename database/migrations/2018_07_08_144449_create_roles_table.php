<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('is_admin', array('Y', 'N'))->default('N');
            $table->enum('is_default', array('Y', 'N'))->default('N');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
