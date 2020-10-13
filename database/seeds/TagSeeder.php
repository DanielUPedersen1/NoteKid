<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
        	'1' => array( // 1 == saqib
        		'php',
        		'python',
        		'automation',
        		'youtube',
        		'contacts'
        	),
        	'4' => array( // 3 == jon
        		'winterfell',
        		'ned',
        		'highwalls',
        		'cold',
        		'redpeople',
        		'firstlove'
        	),
        	'6' => array( // 5 == tommy
        		'brothers',
        		'funds',
        		'profits',
        		'loses',
        		'police',
        		'sister',
        		'takeover',
        		'politics'
        	),
        );

	      foreach ($tags as $userId => $userTags) {
	      	foreach ($userTags as $key => $tag) {
	      		Tag::create(['user_id' => $userId, 'name' => $tag]);
	      	}
	      }
    }
}
