<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios',function($table) 
		{
			$table->create();
			$table->increments('id');
			$table->string('username',30); 
			$table->string('apellido',30);
			$table->string('password',15); 
			$table->date('nacimiento');
			$table->boolean('sexo');
			$table->string('email',50);
			$table->string('provincia',30);
			$table->string('ciudad',30);
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
		Schema::drop('usuarios');
	}

}
