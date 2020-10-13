<?php

use Illuminate\Database\Seeder;

class NoteTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
        	1 => array('user_id' => 1, 'tags' => array(1, 3)),
        	2 => array('user_id' => 1, 'tags' => array(1)),
        	3 => array('user_id' => 1, 'tags' => array(3, 4)),
        	4 => array('user_id' => 4, 'tags' => array(6, 7)),
        	5 => array('user_id' => 4, 'tags' => array(8, 9, 10)),
        	6 => array('user_id' => 4, 'tags' => array(10)),
        	7 => array('user_id' => 6, 'tags' => array(15)),
        	8 => array('user_id' => 6, 'tags' => array(14, 15)),
        	9 => array('user_id' => 6, 'tags' => array(18))
        );

        foreach ($list as $noteId => $values) {
        	$userId = $values['user_id'];
        	foreach ($values['tags'] as $key => $tag) {
        		DB::table('note_tag')->insert([
						  ['user_id' => $userId, 'note_id' => $noteId, 'tag_id' => $tag]
						]);
        	}
        }
    }
}
