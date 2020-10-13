<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
        	'1' => array( // 1 == saqib
        		'Work',
        		'Personal',
        		'Programming'
        	),
        	'4' => array( // 3 == jon
        		'North',
        		'TheWall',
        		'Wildlings'
        	),
        	'6' => array( // 5 == tommy
        		'Aurthur',
        		'ShelbyCompany',
        		'Ada',
        		'Plans'
        	),
        );

	      foreach ($categories as $userId => $userCats) {
	      	foreach ($userCats as $key => $cat) {
	      		Category::create(['user_id' => $userId, 'name' => $cat]);
	      	}
	      }
    }
}
