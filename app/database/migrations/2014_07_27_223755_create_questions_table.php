<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		
		Schema::create('questions', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        // Most tables start off this way
        $table->increments('id');

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();

        // The rest of the fields...
        $table->string('Question');
        $table->string('Context');
        $table->string('Genre');

        // FYI: We're skipping the 'tags' field for now; more on that later.

    });
			}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
