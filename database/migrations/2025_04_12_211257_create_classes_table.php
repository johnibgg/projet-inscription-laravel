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
    Schema::create('classes', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->unsignedBigInteger('cycle_id');
        $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
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
        Schema::dropIfExists('classes');
    }
};
