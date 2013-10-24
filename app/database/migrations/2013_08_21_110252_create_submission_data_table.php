<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submission_data', function(Blueprint $table)
		{
			$table->string('form');
			$table->float('version');
			$table->integer('form_version')->default(1);
			$table->string('key');
			$table->text('value');

			$table->integer('submission_id')->unsigned();
			$table->foreign('submission_id')->references('id')->on('submissions');
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
		Schema::drop('submission_data');
	}

}

