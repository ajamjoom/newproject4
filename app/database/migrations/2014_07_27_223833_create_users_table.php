<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

    $table->increments('id')->unsigned();
   //no duplicate emails so each person would only have one account
    $table->string('email')->unique();
    // no duplicate usernames, I don't think this would be neccessary if I can add profile pictures for my users
    $table->string('username')->unique();
    $table->boolean('remember_token');
    $table->string('password');
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
		Schema::drop('users');
	}

}
