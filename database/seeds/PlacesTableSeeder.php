<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = [
	        ['place' => 'Kozhikode', 'slug' => 'kozhikode'],
	        ['place' => 'Kannur', 'slug' => 'kannur'],
	        ['place' => 'Thissur', 'slug' => 'thissur'],
	        ['place' => 'Kochi', 'slug' => 'kochi'],
	        ['place' => 'Thiruvanathapuram', 'slug' => 'thiruvanathapuram'],
	        ['place' => 'Palakkad', 'slug' => 'palakkad'],
	        ['place' => 'Thiruvalla', 'slug' => 'thiruvalla']
        ];

        DB::table('places')->insert($places);
    }
}
