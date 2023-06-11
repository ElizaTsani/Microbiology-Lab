<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->date('date_done')->nullable();
            $table->date('date_skipped');
            $table->string('status')->default('Created');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
