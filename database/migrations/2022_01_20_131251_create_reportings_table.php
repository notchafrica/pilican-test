<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->double('products')->default(0);
            $table->double('services')->default(0);
            $table->double('customers')->default(0);
            $table->double('providers')->default(0);
            $table->double('teams')->default(0);
            $table->double('categories')->default(0);
            $table->double('pending_sales')->default(0);
            $table->double('completed_sales')->default(0);
            $table->double('invoices')->default(0);
            $table->double('purchase')->default(0);
            $table->double('customer_cash')->default(0);
            $table->double('customer_dept')->default(0);
            $table->double('provider_cash')->default(0);
            $table->double('provider_dept')->default(0);
            $table->double('cash_total')->default(0);
            $table->double('cash_out')->default(0);
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
        Schema::dropIfExists('reportings');
    }
}
