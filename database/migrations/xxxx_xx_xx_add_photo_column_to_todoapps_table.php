<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('todoapps', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('tasks');
        });
    }

    public function down()
    {
        Schema::table('todoapps', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}; 