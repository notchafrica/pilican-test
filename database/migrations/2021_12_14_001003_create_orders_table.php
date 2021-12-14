<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->nullable();
            $table->string('currency')->default('XAF');
            $table->string('method')->default('cash');
            $table->string("reference", 100)->nullable();
            $table->foreignId('customer_id')->nullable()->constrained();
            $table->text('reason')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
