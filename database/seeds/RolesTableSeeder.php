<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Let's clear the roles table first
        Role::truncate();

        //$faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
		
		$data = array(
			array('name'=>'Administrator'),
			array('name'=>'Author'),
			array('name'=>'Subscriber'),
		);
		
		foreach($data as $row) {
			Role::create($row);
		}
    }
}
