<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name');
            $table->string('taxpayer_id', 50);
            $table->string('email', 150)->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('price_id')->nullable()->constrained();
            $table->string('website', 200);
            $table->boolean('credit')->default(false);
            $table->integer('credit_days')->unsigned()->default(0);
            $table->double('credit_limit')->unsigned()->default(0);
            $table->double('balance')->unsigned()->default(0);
            $table->string('comments', 255)->nullable();
            $table->string('street')->nullable();
            $table->string('int_number')->nullable();
            $table->string('out_number')->nullable();
            $table->string('suburb')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('contact')->nullable();
            $table->string('reference')->nullable();
            $table->string('conditions')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
