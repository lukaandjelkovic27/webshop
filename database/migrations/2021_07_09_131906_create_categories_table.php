<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->boolean('bmw');
            $table->boolean('mercedes');
            $table->boolean('fiat');
            $table->boolean('gasoline');
            $table->boolean('gasoline');
            $table->boolean('saloon');
            $table->boolean('suv');
            $table->boolean('caravan');
            $table->boolean('hatchback');
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
        Schema::dropIfExists('categories');
    }
}
