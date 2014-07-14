<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('password');
			$table->timestamp('last_login_at');
			$table->timestamps();		// gives us created_at and updated_at
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
