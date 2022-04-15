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
Schema::create('carts', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('casher_id');
$table->foreign('casher_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('CASCADE');
$table->unsignedBigInteger('stock_id');
$table->bigInteger('rno')->nullable();
$table->bigInteger('tno')->nullable();
$table->foreign('stock_id')->references('id')->on('stocks')->onDelete('NO ACTION')->onUpdate('CASCADE');
$table->foreign('rno')->references('receipt_number')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
$table->foreign('tno')->references('tin_number')->on('receipts')->onDelete('CASCADE')->onUpdate('CASCADE');
$table->integer('amount');
$table->float('total_price');
$table->boolean('status')->default(0);
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
Schema::dropIfExists('carts');
}
};