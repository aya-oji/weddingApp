<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'テストアドミン',
            'email' => 'testAdmin@test.com',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('testAdmin'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
