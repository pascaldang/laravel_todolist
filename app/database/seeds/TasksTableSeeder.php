<?php

class TasksTableSeeder extends Seeder {
	public function run() {
		DB::table('tasks')->delete();

		$tasks = array(
			array(
				'id' => 1,
				'user_id' => '1',
				'name' => 'Course'
			),

			array(
				'id' => 2,
				'user_id' => '2',
				'name' => 'Vaisselle'
			),

			array(
				'id' => 3,
				'user_id' => '3',
				'name' => 'Poubelle'
			)
		);

		DB::table('tasks')->insert($tasks);
	}
}