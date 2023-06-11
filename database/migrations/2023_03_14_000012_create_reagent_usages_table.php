<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReagentUsagesTable extends Migration
{
    public function up()
    {
        Schema::create('reagent_usages', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id', 'test_id_fk_8181509')->references('id')->on('tests')->onDelete('cascade');
            $table->unsignedBigInteger('reagent_id');
            $table->foreign('reagent_id', 'reagent_id_fk_8181510')->references('id')->on('reagents')->onDelete('cascade');
            $table->string('quantity');
        });
    }
}
