<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountColunmChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('learning_data', function (Blueprint $table) {
            $table->bigInteger('count_1')->nullable()->change();
            $table->bigInteger('count_2')->nullable()->change();
            $table->bigInteger('count_3')->nullable()->change();
            $table->bigInteger('count_4')->nullable()->change();
            $table->bigInteger('count_5')->nullable()->change();
            $table->bigInteger('count_6')->nullable()->change();
            $table->bigInteger('count_7')->nullable()->change();
            $table->bigInteger('count_8')->nullable()->change();
            $table->bigInteger('count_9')->nullable()->change();
            $table->bigInteger('count_10')->nullable()->change();
            $table->bigInteger('count_11')->nullable()->change();
            $table->bigInteger('count_12')->nullable()->change();
            $table->bigInteger('count_13')->nullable()->change();
            $table->bigInteger('count_14')->nullable()->change();
            $table->bigInteger('count_15')->nullable()->change();
            $table->bigInteger('count_16')->nullable()->change();
            $table->bigInteger('count_17')->nullable()->change();
            $table->bigInteger('count_18')->nullable()->change();
            $table->bigInteger('count_19')->nullable()->change();
            $table->bigInteger('count_20')->nullable()->change();
            $table->bigInteger('count_21')->nullable()->change();
            $table->bigInteger('count_22')->nullable()->change();
            $table->bigInteger('count_23')->nullable()->change();
            $table->bigInteger('count_24')->nullable()->change();
            $table->bigInteger('count_25')->nullable()->change();
            $table->bigInteger('count_26')->nullable()->change();
            $table->bigInteger('count_27')->nullable()->change();
            $table->bigInteger('count_28')->nullable()->change();
            $table->bigInteger('count_29')->nullable()->change();
            $table->bigInteger('count_30')->nullable()->change();
            $table->bigInteger('count_31')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learning_data', function (Blueprint $table) {
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
        });
    }
}
