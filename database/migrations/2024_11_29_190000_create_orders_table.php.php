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
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('fiscal_data');
            $table->string('delivery_address');
            $table->text('notes')->nullable();
            $table->string('status');
            $table->timestamp('order_date');
            $table->softDeletes(); // Esto incluye automáticamente `deleted_at`
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
