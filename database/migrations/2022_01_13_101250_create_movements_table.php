<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->string('document', 255);
            $table->string('reference', 100)->nullable();
            $table->integer('quantity');
            $table->double('price')->unsigned()->nullable();
            $table->double('cost')->nullable()->unsigned();
            $table->double('tax')->nullable()->unsigned()->nullable();
            $table->string('comments')->nullable();
            $table->integer('stock')->unsigned();
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
        Schema::dropIfExists('movements');
    }
}
