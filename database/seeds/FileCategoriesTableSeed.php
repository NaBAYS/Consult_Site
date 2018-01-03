<?php

use App\FileCategory;
use Illuminate\Database\Seeder;

class FileCategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = [
    		'business-case' => 'Business Case',
		    'benefits-management' => 'Benefits Management',
		    'clean-assets' => 'Clean Assets',
		    'account-planning' => 'Account Planning',
		    'bpo' => 'BPO',
		    'approval-process' => 'Approval Process',
		    'materiality' => 'Materiality',
		    'finance' => 'Finance',
		    'enterprise-cost-reduction' => 'Enterprise Cost Reduction',
		    'program-transfer' => 'Program Transfer',
	    ];

    	foreach ($categories as $short => $long) {
		    FileCategory::create([
			    'short_name' => $short,
			    'long_name' => $long
		    ]);
	    }
    }
}
