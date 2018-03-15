<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTours1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours1', function (Blueprint $table) {
            $table->increments('id');            
			$table->string('title');
            $table->integer('price')->nullable();
            $table->integer('offer')->nullable();
            $table->string('package');
			$table->integer('destination_id')->index()->unsigned()->nullable();			
			$table->integer('category_id')->index()->unsigned()->nullable();			
            $table->text('body');
            $table->text('includes');
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
        Schema::dropIfExists('tours1');
    }
}
