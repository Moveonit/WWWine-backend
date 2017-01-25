<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wineries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('city');
            $table->string('province');
            $table->string('state');
            $table->string('address');
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->string('VAT_Number')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('wineries');
    }
}
