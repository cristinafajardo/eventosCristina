<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fotos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotos',function($table) 
		{
			$table->create();
			$table->increments('id');
			$table->integer('idevento')->unsigned();
			$table->foreign('idevento')->references('id')->on('eventos')->onDelete('cascade'); 	 			
			$table->string('titulo',30); 
			$table->string('photo'); 			
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
		Schema::drop('fotos');
	}

}
