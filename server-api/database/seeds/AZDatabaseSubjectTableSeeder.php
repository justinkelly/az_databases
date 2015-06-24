<?php
 
use Illuminate\Database\Seeder;
 
class AZDatabaseSubjectTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('az_database_subject')->delete();
 
        $projects = array(
            ['id' => '', 'database_id' => '1','subject_id' => '7', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '2','subject_id' => '19', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '2','subject_id' => '5', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '2','subject_id' => '7', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('az_database_subject')->insert($projects);
    }
 
}
