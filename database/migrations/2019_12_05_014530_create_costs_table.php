<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('mess_id');
            $table->decimal('net_cost', 8 , 2);
            $table->decimal('maid_cost', 8 , 2);
            $table->decimal('room_rent', 8 , 2);
            $table->decimal('others_cost', 8 , 2)->nullable();
            $table->decimal('total_cost', 8 , 2)->nullable();
            $table->decimal('total_paid', 8 , 2)->nullable();
            $table->decimal('total_due', 8 , 2)->nullable();
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
        Schema::dropIfExists('costs');
    }
}
