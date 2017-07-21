<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$departments = [['name' => 'Allergy Asthma'],
				    	['name' => 'Arthritis and Backache'],
				    	['name' => 'Autism, Epilepsy and Neuro'],
				    	['name' => 'Diabetes and Life Style Disease '],
				    	['name' => 'Cardiology'],
				    	['name' => 'Diabetes and Life Style Disease'],
				    	['name' => 'Gastro Enterology'],
				    	['name' => 'E N T and Headache'],
				    	['name' => 'Gynaecology And Infertility'],
				    	['name' => 'Hair Clinic'],
				    	['name' => 'Psycharty'],
				    	['name' => 'Skin And Hair Care'],
				    	['name' => 'Skin Clinic'],
				    	['name' => 'Urology'],
				    	['name' => 'Thyroid'],
				    	['name' => 'Paediatric'],
				    	['name' => 'Educational Psychology'],
				    	['name' => 'General and Family Counseling'],
				    	['name' => 'Behavior And Learning Disability']
    	];

        DB::table('departments')->insert($departments);
    }
}
