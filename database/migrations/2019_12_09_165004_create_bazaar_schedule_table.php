<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBazaarScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazaar_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mess_id');
            $table->date('dates');
            //$table->date('end_date');
            $table->string('bazar_cost')->nullable();
            $table->string('bazar_list')->nullable();
            $table->string('comment')->nullable();
            $table->string('user_id');
            $table->string('manager_id');


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
        Schema::dropIfExists('bazaar_schedule');
    }
}
