<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Modify the 'type' column to a new data type
            $table->enum('type', ['Earned', 'Spent', 'Refunded'])->default('Earned')->change();
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Reverse the changes made in the 'up' method
            $table->integer('type')->change();
        });
    }
};
