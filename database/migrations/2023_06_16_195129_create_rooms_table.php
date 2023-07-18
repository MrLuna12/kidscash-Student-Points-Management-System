<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
