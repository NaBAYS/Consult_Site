<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create super admin role
        Role::create([
        	'short_name' => 'super',
	        'long_name' => 'Super Admin',
        ]);

	    Role::create([
		    'short_name' => 'trial',
		    'long_name' => 'Trial User',
	    ]);

	    Role::create([
		    'short_name' => 'paid',
		    'long_name' => 'Paid User',
	    ]);


    }
}
