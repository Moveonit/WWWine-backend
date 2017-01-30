<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('production_year');
            $table->string('classification')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
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
            $table->boolean('verified')->default(false);
            $table->bigInteger('cellar_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cellar_id')->references('id')->on('cellars');

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
        Schema::dropIfExists('beverages');
    }
}
