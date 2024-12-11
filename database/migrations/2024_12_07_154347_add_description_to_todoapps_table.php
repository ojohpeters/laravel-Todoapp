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
        Schema::table('todoapps', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->boolean('completed');
        });
    }
    
    public function down()
    {
        Schema::table('todoapps', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
