<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $locations = [
	        [
	        'name' => 'Kozhikode', 
	        'slug' => 'kozhikode',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	        ],
	        [
	        'name' => 'Kannur', 
	        'slug' => 'kannur',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	        ],
	        [
	        'name' => 'Thissur', 
	        'slug' => 'thissur',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	        ],
	        [
	        'name' => 'Kochi',
	        'slug' => 'kochi',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	         ],
	        [
	        'name' => 'Thiruvanathapuram',
	       	'slug' => 'thiruvanathapuram',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	         ],
	        [
	        'name' => 'Palakkad',
	        'slug' => 'palakkad',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	         ],
	        [
	        'name' => 'Thiruvalla', 
	        'slug' => 'thiruvalla',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	        ],
	        [
	        'name' => 'Manjeri (comming soon)', 
	        'slug' => 'manjeri',
	        'address'=>'Ground Floor, J.R Complex
					Near Chettipeedika, Kannur 670004',
			'phone' => '0497 2768333, 0497 3203025',
			'email' => 'aihhms@gmail.com',
			'working_time' => '9.00 am to 7.00 pm'
	        ]
        ];
        DB::table('locations')->insert($locations);
    }

}
