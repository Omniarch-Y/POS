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
    Schema::create('stocks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('total_amount');
        $table->string('price');
        $table->string('image');
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('branch_id');
        $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('category_id')->references('c_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('stocks');
    }
};