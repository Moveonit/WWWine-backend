<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('production_year');
            $table->string('classification')->nullable();
            $table->string('production_area')->nullable();
            $table->string('grapes_type')->nullable();
            $table->string('grapes_area')->nullable();
            $table->decimal('grapes_longitude', 10, 7)->nullable();
            $table->decimal('grapes_latitude', 10, 7)->nullable();
            $table->string('color')->nullable();
            $table->string('fragrance')->nullable();
            $table->string('taste')->nullable();
            $table->string('vinification')->nullable();
            $table->string('proof')->nullable();
            $table->string('service_temperature')->nullable();
            $table->string('refiniment')->nullable();
            $table->bigInteger('winery_id')->unsigned()->nullable();

            $table->foreign('winery_id')->references('id')->on('wineries');

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
        Schema::dropIfExists('wines');
    }
}
