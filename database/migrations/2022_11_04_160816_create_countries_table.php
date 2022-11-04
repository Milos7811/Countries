<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integer('country_id')->primary()->index();
            $table->char('code', 2)->unique();
            $table->string('name', 64);
            $table->string('full_name', 128);
            $table->char('iso3', 3);
            $table->integer('number')->unsigned();
            $table->char('continent_code', 2);
            $table->integer('display_order')->length(2)->default(900);
            $table->foreign('continent_code', 2)->references('code')->on('continents');

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
