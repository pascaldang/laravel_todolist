<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();

		$users = array(
			array(
				'id' => 1,
				'email' => 'dang.pascal@hotmail.fr',
				'username' => 'Doudou',
				'password' => Hash::make('doudou'),
			),

			array(
				'id' => 2,
				'email' => 'loge.florian@hotmail.fr',
				'username' => 'Flo',
				'password' => Hash::make('flo'),
			),

			array(
				'id' => 3,
				'email' => 'alarcon.loic@hotmail.fr',
				'username' => 'Loic',
				'password' => Hash::make('loic'),
			)
		);

		DB::table('users')->insert($users);
	}
}