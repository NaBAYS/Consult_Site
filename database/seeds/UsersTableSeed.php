<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $admin_role_id = \App\Role::where('short_name', 'super')->first()->id;

	    // Make my super admin account
        User::create([
        	'first_name' => 'Najeem',
            'last_name' => 'Baysudee',
	        'email' => 'nabays@gmail.com',
	        'password' => bcrypt('test1234'),
	        'user_name' => 'NajeemB',
	        'role_id' => $admin_role_id,
        ]);

        // Make secondary account
	    User::create([
	    	'first_name' => 'Test',
		    'last_name' => 'User',
		    'email' => 'test@test.com',
		    'password' => bcrypt('test1234'),
		    'user_name' => 'AnotherUser',
		    'role_id' => $admin_role_id
	    ]);
    }
}
