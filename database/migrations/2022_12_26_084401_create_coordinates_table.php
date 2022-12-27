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
        Schema::create('coordinates', function (Blueprint $table) {
            $table->id();
            $table->string('latitude');
            $table->string('longitude');
            $table->float('00H');
            $table->float('01H');
            $table->float('02H');
            $table->float('03H');
            $table->float('04H');
            $table->float('05H');
            $table->float('06H');
            $table->float('07H');
            $table->float('08H');
            $table->float('09H');
            $table->float('10H');
            $table->float('11H');
            $table->float('12H');
            $table->float('13H');
            $table->float('14H');
            $table->float('15H');
            $table->float('16H');
            $table->float('17H');
            $table->float('18H');
            $table->float('19H');
            $table->float('20H');
            $table->float('21H');
            $table->float('22H');
            $table->float('23H');
            $table->float('24H');
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
        Schema::dropIfExists('coordinates');
    }
};
