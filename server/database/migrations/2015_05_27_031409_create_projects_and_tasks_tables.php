<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsAndTasksTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('az_area', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->timestamps();
		});

		Schema::create('az_database', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->text('description')->default('');
			$table->string('time')->default('');
			$table->string('url')->default('');
			$table->string('url_alt')->default('');
			$table->timestamps();
		});

		Schema::create('az_database_area', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('database_id')->unsigned()->default(0);
			$table->foreign('database_id')->references('id')->on('az_database')->onDelete('cascade');
			$table->integer('area_id')->unsigned()->default(0);
			$table->foreign('area_id')->references('id')->on('az_area')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('az_subject', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('area_id')->unsigned()->default(0);
			$table->foreign('area_id')->references('id')->on('az_area')->onDelete('cascade');
			$table->string('name')->default('');
			$table->timestamps();
		});

		Schema::create('az_database_subject', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('database_id')->unsigned()->default(0);
			$table->foreign('database_id')->references('id')->on('az_database')->onDelete('cascade');
			$table->integer('subject_id')->unsigned()->default(0);
			$table->foreign('subject_id')->references('id')->on('az_subject')->onDelete('cascade');
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
		Schema::drop('az_area');
		Schema::drop('az_database');
		Schema::drop('az_database_area');
		Schema::drop('az_database_subject');
		Schema::drop('az_subject');
	}

}
