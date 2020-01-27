<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('dyddiad');
            $table->string('title');
            $table->string('title_cym');
            $table->string('image');
            $table->string('asset');
            $table->string('asset_cym');
            $table->string('asset_type');
            $table->tinyInteger('major_event');
            $table->string('credit');
            $table->string('disgrifiad');
            $table->string('quote');
            $table->string('nobg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelines');
    }
}
