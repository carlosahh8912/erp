<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 50)->nullable();
            $table->string('ean', 20)->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->double('cost')->unsigned()->nullable();
            // $table->double('price')->unsigned();
            $table->integer('stock_max')->unsigned()->nullable();
            $table->integer('stock_min')->unsigned()->nullable();
            $table->string('output_unit',10)->default('pz');
            $table->string('input_unit', 10)->default('pz');
            $table->integer('sales')->unsigned()->default(0);
            $table->double('height')->unsigned()->nullable();
            $table->double('width')->unsigned()->nullable();
            $table->double('length')->unsigned()->nullable();
            $table->double('weight')->unsigned()->nullable();
            $table->enum('weight_unit', ['mg','g','kg','t'])->nullable();
            $table->enum('measurement_unit', ['mm','cm','m','dam','hm','km'])->nullable();
            $table->enum('type', ['product','service'])->default('product');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
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
        Schema::dropIfExists('products');
    }
}
