<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->morphs('detailable');
            $table->foreignId('product_id')->constrained();
            $table->integer('cost')->unsigned()->nullable();
            $table->double('price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('pending_quantity')->unsigned()->default(0);
            $table->double('tax')->unsigned();
            $table->double('discount')->unsigned();
            $table->integer('stock')->unsigned()->nullable();
            $table->string('comments')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('details');
    }
}
