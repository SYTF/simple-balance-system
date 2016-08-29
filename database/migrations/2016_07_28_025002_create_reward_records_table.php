<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rewardRecords', function(Blueprint $table){
          $table->increments('id');
          $table->string('item');
          $table->double('amount');
          $table->tinyInteger('type');
          $table->dateTime('recordDate');
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
        //
        Schema::dropIfExists('rewardRecords');
    }
}
