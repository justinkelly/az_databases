<?php
 
use Illuminate\Database\Seeder;
 
class AZAreaTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('az_area')->delete();
 
        $projects = array(
            ['id' => '1', 'name' => 'Arts and Social Science', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'name' => 'Aviation', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'name' => 'Business and Management', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'name' => 'Design', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'name' => 'Digital Media', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'name' => 'Engineering', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'name' => 'English Language and Study Skills', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'name' => 'Environment and Land Management', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'name' => 'Film and Television', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'name' => 'Health Sciences', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'name' => 'Information and Communications Technology', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'name' => 'Media and Communications', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'name' => 'Performing and Creative Arts', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'name' => 'Psychology', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'name' => 'Science', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'name' => 'Trades and Apprenticeships', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('az_area')->insert($projects);
    }
 
}
