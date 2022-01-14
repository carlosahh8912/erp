<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('seller_id')->nullable()->constrained();
            $table->string('document')->nullable();
            $table->string('comments')->nullable();
            $table->string('conditions')->nullable();
            $table->double('balance')->unsigned();
            $table->double('subtotal')->unsigned();
            $table->double('tax')->unsigned()->nullable();
            $table->double('discount')->unsigned()->nullable();
            $table->string('type_next_document', 20)->nullable();
            $table->bigInteger('id_next_document')->unsigned()->nullable();
            $table->string('type_previous_document', 20)->nullable();
            $table->bigInteger('id_previous_document')->unsigned()->nullable();
            $table->enum('status',['issued','cancelled','returned'])->default('issued');
            $table->enum('payment_status',['paid','partial','active'])->default('active');
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
        Schema::dropIfExists('invoices');
    }
}
