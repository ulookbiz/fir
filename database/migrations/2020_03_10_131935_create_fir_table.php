<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fir', function (Blueprint $table) {
            $table->id();
            $table->string('e_word', 25);
            $table->string('r_word', 25);
            $table->string('e_phrase');
            $table->string('r_phrase');
            $table->string('pic_name',40);
            $table->string('short_audio',40);
            $table->string('long_audio',40);
            $table->string('copyright', 40);
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
        Schema::dropIfExists('fir');
    }
}
