<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    Role::create([
	    	'name' => 'user',
	    	'description' => 'A normal user'
	    	]);

	     Role::create([
	    	'name' => 'support',
	    	'description' => 'A suport user'
	    	]);

	     Role::create([
	    	'name' => 'admin',
	    	'description' => 'A admin user'
	    	]);

    }
}
