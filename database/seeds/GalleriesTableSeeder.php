<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$gallery = [];
    	for($i = 1; $i<=22; $i++){
    		$gallery[] = ['image' => $i.".jpg", 'listing_order' => 22-$i];
    	}
        DB::table('galleries')->insert($gallery);
    }
}
