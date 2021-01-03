<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBazaarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazaars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('bazaar_cost', 8, 2);
            $table->string('comment');
            
            $table->integer('user_id');
            $table->integer('mess_id');

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
        Schema::dropIfExists('bazaars');
    }
}
