<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $role_user = Role::where('name', 'user')->first();
	    $role_suport  = Role::where('name', 'suport')->first();
	    $role_admin = Role::where('name', 'admin')->first();

	    	//user
	    	$user = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	           'userName' => 'nandom',
	           'password' => bcrypt('123456') 
        	 ]);
	    	$user->roles()->attach($role_user);

	    	$user = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	           'userName' => 'nanle',
	           'password' => bcrypt('123456') 
        	 ]);
	    	$user->roles()->attach($role_user);

	    	$user = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	           'userName' => 'issac',
	           'password' => bcrypt('123456') 
        	 ]);
	    	$user->roles()->attach($role_user);

	    	$user = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	           'userName' => 'james',
	           'password' => bcrypt('123456') 
        	 ]);
	    	$user->roles()->attach($role_user);

	    	//suport
	    	$suport = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	    		'userName'=>'alfred',
	    		'password' => bcrypt('123456')
	    	 ]);
	    	$suport->roles()->attach($role_suport);

	    	$suport = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	    		'userName'=>'scot',
	    		'password' => bcrypt('123456')
	    	 ]);
	    	$suport->roles()->attach($role_suport);

	    	$suport = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	    		'userName'=>'royal',
	    		'password' => bcrypt('123456')
	    	 ]);
	    	$suport->roles()->attach($role_suport);

	    	$suport = User::create([
	    		'location_id' => 'nill',
	    		'office_id' => 'nill',
	    		'userName'=>'joy',
	    		'password' => bcrypt('123456')
	    	 ]);
	    	$suport->roles()->attach($role_suport);

	    	//admin
	     	$admin = User::create([
	     		'location_id' => 'nill',
	    		'office_id' => 'nill',
	    		'userName'=>'retnan',
	    		'password' => bcrypt('123456')
	    	 ]);
	    	$admin->roles()->attach($role_admin);
	}
}
