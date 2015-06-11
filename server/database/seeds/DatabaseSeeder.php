<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AZDatabaseTableSeeder');	
		$this->call('AZAreaTableSeeder');	
		$this->call('AZSubjectTableSeeder');	
		$this->call('AZDatabaseAreaTableSeeder');	
		$this->call('AZDatabaseSubjectTableSeeder');	
		// $this->call('UserTableSeeder');
	}

}
