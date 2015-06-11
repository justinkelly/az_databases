<?php
 
use Illuminate\Database\Seeder;
 
class AZSubjectTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('az_subject')->delete();
 
        $projects = array(
            ['id' => '1', 'area_id'=>'1','name' => 'Art History', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'area_id'=>'1','name' => 'Social History', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'area_id'=>'2','name' => 'Safety', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'area_id'=>'3','name' => 'Accounting', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'area_id'=>'3','name' => 'Advertisting', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'area_id'=>'3','name' => 'Banking and Finance', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'area_id'=>'3','name' => 'Business and Management', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'area_id'=>'3','name' => 'Human Resource management', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'area_id'=>'3','name' => 'International Business', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'area_id'=>'3','name' => 'Marketing', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'area_id'=>'3','name' => 'Public Relations', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'area_id'=>'3','name' => 'Tourism', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'area_id'=>'4','name' => 'Electronic', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'area_id'=>'4','name' => 'Print', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'area_id'=>'5','name' => 'Web', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'area_id'=>'5','name' => 'Photoshop', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '17', 'area_id'=>'6','name' => 'Electronic', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '18', 'area_id'=>'6','name' => 'Mechanical', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '19', 'area_id'=>'11','name' => 'Databases', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '20', 'area_id'=>'11','name' => 'Java', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '21', 'area_id'=>'11','name' => 'Operating Systems', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '22', 'area_id'=>'11','name' => 'PHP', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '23', 'area_id'=>'11','name' => 'Networking', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '24', 'area_id'=>'11','name' => 'Unix', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '25', 'area_id'=>'11','name' => 'Windows', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '26', 'area_id'=>'11','name' => 'Apple', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('az_subject')->insert($projects);
    }
 
}

