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
Schema::create('categories', function (Blueprint $table) {
<<<<<<< HEAD
        
        $table->id();
        $table->string('category_name')->unique();
        $table->timestamps();
=======
$table->id('c_id');
$table->string('category_name')->unique();
$table->timestamps();
>>>>>>> aa4f2d54e4d59c39fcd75d6356ba3b0298448c9d
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('categories');
}
};