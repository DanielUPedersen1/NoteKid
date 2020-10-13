<?php

use Illuminate\Database\Seeder;
use App\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = array(
        	'1' => array( // 1 == saqib
        		'Coding Snippets' => array(
        			'category_id' => 3, // programming
        			'content' => '<?php echo "hello world"; ?>'
        		),
        		'SQL Snippets' => array(
        			'category_id' => 3, // programming
        			'content' => 'select something from somewhere;'
        		),
        		'5 ways to be more productive' => array(
        			'category_id' => 2, // personal
        			'content' => 'here goes my content'
        		)
        	),
        	'4' => array( // 3 == jon
        		'Who is the father?' => array(
        			'category_id' => 4, // north
        			'content' => 'Ned? Some giant? Some futa?'
        		),
        		'Best blankets in town' => array(
        			'category_id' => 5, // wall
        			'content' => 'red, brown, green'
        		),
        		'Water places to have fun' => array(
        			'category_id' => 6, // wildlings
        			'content' => 'the cave and more'
        		)
        	),
        	'6' => array( // 5 == tommy
        		'Killer list' => array(
        			'category_id' => 8, // shelbycompany
        			'content' => 'People to kill next'
        		),
        		'Bets' => array(
        			'category_id' => 8, // shelbycompany
        			'content' => 'horses, teams and women'
        		),
        		'Best properties to invest into' => array(
        			'category_id' => 10, // ada
        			'content' => 'Gotta buy something for ada aight!'
        		)
        	),
        );

	      foreach ($notes as $userId => $note) {
	      	foreach ($note as $title => $noteContents) {
	      		Note::create([
	      			'user_id' => $userId,
	      			'category_id' => $noteContents['category_id'],
	      			'content' => $noteContents['content'],
	      			'title' => $title
	      		]);
	      	}
	      }
    }
}
