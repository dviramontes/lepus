<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('form_fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('value')->nullable();
			$table->text('title');
			$table->string('type');
			$table->integer('width');
			$table->boolean('required');

			$table->integer('form_id')->unsigned();
			$table->foreign('form_id')->references('id')->on('forms');
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
		Schema::drop('form_fields');
	}

}
