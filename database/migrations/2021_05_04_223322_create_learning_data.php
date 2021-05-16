<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('display_order');
            $table->string('ym');
            $table->string('item_name');
            $table->bigInteger('count_1');
            $table->bigInteger('count_2');
            $table->bigInteger('count_3');
            $table->bigInteger('count_4');
            $table->bigInteger('count_5');
            $table->bigInteger('count_6');
            $table->bigInteger('count_7');
            $table->bigInteger('count_8');
            $table->bigInteger('count_9');
            $table->bigInteger('count_10');
            $table->bigInteger('count_11');
            $table->bigInteger('count_12');
            $table->bigInteger('count_13');
            $table->bigInteger('count_14');
            $table->bigInteger('count_15');
            $table->bigInteger('count_16');
            $table->bigInteger('count_17');
            $table->bigInteger('count_18');
            $table->bigInteger('count_19');
            $table->bigInteger('count_20');
            $table->bigInteger('count_21');
            $table->bigInteger('count_22');
            $table->bigInteger('count_23');
            $table->bigInteger('count_24');
            $table->bigInteger('count_25');
            $table->bigInteger('count_26');
            $table->bigInteger('count_27');
            $table->bigInteger('count_28');
            $table->bigInteger('count_29');
            $table->bigInteger('count_30');
            $table->bigInteger('count_31');
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
        Schema::dropIfExists('learning_data');
    }
}
