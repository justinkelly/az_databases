<?php
 
use Illuminate\Database\Seeder;
 
class AZDatabaseAreaTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('az_database_area')->delete();
 
        $projects = array(
            ['id' => '', 'database_id' => '1','area_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '2','area_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '2','area_id' => '11', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '3','area_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '4','area_id' => '11', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '4','area_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '4','area_id' => '4', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '4','area_id' => '5', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '4','area_id' => '6', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '4', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '5', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '6', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '7', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '5','area_id' => '8', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '6','area_id' => '6', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '7','area_id' => '4', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '8','area_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '8','area_id' => '14', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '9','area_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '', 'database_id' => '10','area_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('az_database_area')->insert($projects);
    }
 
}
