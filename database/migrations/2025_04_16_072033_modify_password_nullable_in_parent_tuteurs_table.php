<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('parent_tuteurs', function (Blueprint $table) {
        $table->string('password')->nullable()->change();
    });
}

public function down()
{
    Schema::table('parent_tuteurs', function (Blueprint $table) {
        $table->string('password')->nullable(false)->change(); // selon le besoin initial
    });
}

};
