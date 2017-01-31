<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeverageTastingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverage_tasting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('beverage_id')->unsigned();
            $table->bigInteger('tasting_id')->unsigned();

            $table->foreign('tasting_id')->references('id')->on('tastings')->onDelete('cascade');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beverage_tasting');
    }
}
