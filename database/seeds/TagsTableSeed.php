<?php

use App\FileTag;
use Illuminate\Database\Seeder;

class TagsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i < 5; $i++) {
		    FileTag::create([
			    'description' => 'Tag' . ($i + 1)
		    ]);
	    }
    }
}
