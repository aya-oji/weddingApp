<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'テストユーザー',
            'email' => 'testUser@test.com',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('testUser'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
